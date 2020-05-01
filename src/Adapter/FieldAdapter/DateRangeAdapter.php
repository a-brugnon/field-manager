<?php

namespace Drupal\field_manager\Adapter\FieldAdapter;

use Drupal\Core\Entity\EntityInterface;
use Drupal\field_manager\Field\DateRangeField;
use Drupal\field_manager\FieldAdapterInterface;
use Drupal\field_manager\FieldInterface;

class DateRangeAdapter implements FieldAdapterInterface {

  public function doesHandle(EntityInterface $entity, string $field): bool {
    return $entity->get($field)->getFieldDefinition()->getType() == 'daterange';
  }

  public function get(EntityInterface $entity, string $field): FieldInterface {
    return new DateRangeField($entity, $field);
  }

}
