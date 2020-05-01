<?php

namespace Drupal\field_manager;

use Drupal\Core\Entity\EntityInterface;

interface FieldAdapterInterface {

  public function doesHandle(EntityInterface $entity, string $field): bool;

  public function get(EntityInterface $entity, string $field): FieldInterface;
}
