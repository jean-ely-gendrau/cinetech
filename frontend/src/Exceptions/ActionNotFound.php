<?php

namespace App\Cinetech\Exceptions;

class ActionNotFound extends \Exception
{
  public function __construct($message = "Ooops une erreur d'actions viens de ce produire")
  {
    parent::__construct($message, "0005");
  }
}
