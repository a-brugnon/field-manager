<?php

namespace Drupal\field_manager\Field;

interface EntityReferenceFieldInterface {

  public function fetchIds();

  public function fetchEntities();

  public function fetchId(int $offset);

  public function fetchEntity(int $offset);

}
