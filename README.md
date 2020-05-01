# How to use it ?

* If u are using an entity reference field
```
@var \Drupal\field_manager\Service\FieldManager $fieldManager */
$fieldManager = Drupal::service('field_manager');
$field = $fieldManager->get($node, 'field_keywords');
if($field insteaof EntityReferenceFieldInterface){
    // Will display all ids : [0 => ID1, 1 => ID2, ...]
    var_dump($field->fetchIds());
    // Will display all entities
    var_dump($field->fetchEntities());
    // Will display only selected ID if exist
    var_dump($field->fetchId(0))
    // Will display only selected entity if exist
    var_dump($field->fetchEntity(0))
}
```
