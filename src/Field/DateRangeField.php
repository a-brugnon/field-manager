<?php

namespace Drupal\field_manager\Field;

use Drupal\datetime_range\Plugin\Field\FieldType\DateRangeItem;

class DateRangeField extends Field implements DateRangeFieldInterface{

  public function fetchValuesFormat(string $format){
    $values = $this->getEntityField()->getIterator();
    $output = [];
    foreach ($values as $value) {
      $output[] = $this->format($value, $format);
    }
    return $output;
  }

  public function fetchValueFormat(int $offset, string $format){
    $value = $this->getEntityField()->get($offset);
    return empty($value) ? NULL : $this->format($value, $format);
  }

  protected function format(DateRangeItem $value, string $format){
    $output = [];
    if (!empty($value->start_date)) {
      $output['start_date'] = $value->start_date->format($format);
    }
    if (!empty($value->end_date)) {
      $output['end_date'] = $value->end_date->format($format);
    }
    return $output;
  }
}
