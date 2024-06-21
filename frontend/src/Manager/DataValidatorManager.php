<?php

namespace App\Cinetech\Manager;

class DataValidatorManager
{
  public static function validate($object): array
  {
    $errors = [];

    $reflection = new \ReflectionClass($object);
    $properties = $reflection->getProperties();

    foreach ($properties as $property) {
      $attributes = $property->getAttributes(ValidatorManager::class);
      foreach ($attributes as $attribute) {
        $validator = $attribute->newInstance();
        $propertyName = $property->getName();
        $propertyValue = $property->getValue($object);
        if (!$validator->validate($propertyValue)) {
          // $errors[$propertyName] = "Invalid {$validator->type} value: {$propertyValue} name: {$propertyName}";
          $errors[$propertyName] = $validator->messageError;
        }
      }
    }

    return $errors;
  }
}
