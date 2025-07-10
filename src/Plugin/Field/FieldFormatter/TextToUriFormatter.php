<?php

declare(strict_types=1);

namespace Drupal\am_custom_formatters\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\Attribute\FieldFormatter;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\Url;

/**
 * Formatter to transform a plain text field to a clickable link.
 *
 * This formatter is based on the one provided by core, but which only handles
 * the 'uri'-type.  However, due to constraints imposed by a third-party API, we
 * can't use the Uri type, and must use plain instead.  Thus, this formatter
 * takes a URI provided by a plain text field, and wraps it in an anchor-tag.
 */
#[FieldFormatter(
    id: 'am_custom_formatters_text_to_uri',
    label: new TranslatableMarkup('AM: plain to link'),
    field_types: [
      'uri',
      'string',
    ],
)]
final class TextToUriFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      if ($item->isEmpty()) {
        continue;
      }

      if (str_starts_with($item->value, 'http://') || str_starts_with($item->value, 'https://')) {
        $elements[$delta] = [
          '#type' => 'link',
          '#url' => Url::fromUri($item->value),
          '#title' => $item->value,
        ];
        continue;
      }

      $elements[$delta] = [
        '#plain_text' => $item->value,
      ];
    }

    return $elements;
  }

}
