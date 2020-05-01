<?php

namespace Drupal\field_manager\Field;

interface DateRangeFieldInterface {

  public function fetchValuesFormat(string $format);

  public function fetchValueFormat(int $offset, string $format);

}
