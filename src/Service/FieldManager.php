<?php

namespace Drupal\field_manager\Service;

use Drupal\Core\Entity\EntityInterface;
use Drupal\field_manager\FieldAdapterInterface;
use Drupal\field_manager\FieldInterface;

class FieldManager {

  /**
   * @var \Drupal\field_manager\FieldAdapterInterface[]
   */
  protected $fieldAdapters;

  /**
   * FieldManager constructor.
   *
   * @param \Drupal\field_manager\FieldAdapterInterface[] $fieldAdapters
   */
  public function __construct(FieldAdapterInterface ...$fieldAdapters) {
    foreach ($fieldAdapters as $fieldAdapter){
      $this->registerFieldAdapter($fieldAdapter);
    }
  }


  public function get(EntityInterface $entity, string $field): ?FieldInterface{
    if($entity->hasField($field) && !$entity->get($field)->isEmpty()){
      foreach ($this->fieldAdapters as $fieldAdapter) {
        if($fieldAdapter->doesHandle($entity, $field)){
          return $fieldAdapter->get($entity, $field);
        }
      }
      return $entity->get($field);
    }
    return NULL;
  }

  public function registerFieldAdapter(FieldAdapterInterface $fieldAdapter){
    $this->fieldAdapters[] = $fieldAdapter;
  }
}
