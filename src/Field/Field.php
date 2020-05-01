<?php

namespace Drupal\field_manager\Field;

use Drupal\Core\Entity\EntityInterface;
use Drupal\field_manager\FieldInterface;

abstract class Field implements FieldInterface {

  /**
   * @var \Drupal\Core\Entity\EntityInterface
   */
  protected $entity;

  /**
   * @var string
   */
  protected $field;

  public function __construct(EntityInterface $entity, string $field) {
    $this->entity = $entity;
    $this->field = $field;
  }

  protected function getEntityField(){
    return $this->entity->get($this->field);
  }

}
