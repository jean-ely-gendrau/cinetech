<?php

namespace App\Cinetech\Builder;

// Classe de validation de formulaire
class Validator
{
  protected $rules = [];

  // Méthode pour ajouter une règle de validation pour un champ donné
  public function addRule($fieldName, $type, $value, $message)
  {
    $this->rules[$fieldName][] = [
      'type' => $type,
      'value' => $value,
      'message' => $message
    ];
  }

  // Méthode pour vérifier si des règles de validation existent pour un champ donné
  public function hasRules($fieldName)
  {
    return isset($this->rules[$fieldName]);
  }

  // Méthode pour obtenir les règles de validation pour un champ donné
  public function getRules($fieldName)
  {
    return isset($this->rules[$fieldName]) ? $this->rules[$fieldName] : [];
  }
}
