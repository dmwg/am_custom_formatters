<?php

declare(strict_types=1);

namespace Drupal\am_custom_formatters\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\Attribute\FieldFormatter;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Formatter to transform a plain text field to an image tag.
 *
 * Takes the URI of an image, and wraps it in an img-tag.
 */
#[FieldFormatter(
    id: 'am_custom_formatters_text_to_img',
    label: new TranslatableMarkup('AM: plain to IMG'),
    field_types: [
      'string',
    ],
)]
final class TextToImgFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode): array {
    $element = [];
    foreach ($items as $delta => $item) {
      $element[$delta] = [
        '#theme' => 'am_custom_formatters',
        '#url' => $item->value,
      ];
    }
    return $element;
  }

}
