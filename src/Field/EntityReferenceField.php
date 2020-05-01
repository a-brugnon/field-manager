<?php

namespace Drupal\field_manager\Field;

class EntityReferenceField extends Field implements EntityReferenceFieldInterface {

  public function fetchIds(){
    return array_map(function($a){ return $a['target_id'];}, $this->getEntityField()->getValue());
  }

  public function fetchEntities(){
    return $this->getEntityField()->referencedEntities();
  }

  public function fetchId(int $offset){
    $ids = $this->fetchIds();
    return $ids[$offset] ?? NULL;
  }

  public function fetchEntity(int $offset){
    $entities = $this->fetchEntities();
    return $entities[$offset] ?? NULL;
  }
}
