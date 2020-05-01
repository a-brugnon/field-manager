<?php

namespace Drupal\field_manager\Adapter\FieldAdapter;

use Drupal\Core\Entity\EntityInterface;
use Drupal\field_manager\Field\EntityReference;
use Drupal\field_manager\FieldAdapterInterface;
use Drupal\field_manager\FieldInterface;

class EntityReferenceAdapter implements FieldAdapterInterface {

  public function doesHandle(EntityInterface $entity, string $field): bool {
    return $entity->get($field)->getFieldDefinition()->getType() == 'entity_reference';
  }

  public function get(EntityInterface $entity, string $field): FieldInterface {
    return new EntityReference($entity, $field);
  }


}
