<?php

namespace App\Cinetech\Exceptions;

class ControllerNotFound extends \Exception
{
  public function __construct($message = "Ooops une erreur de controller viens de ce produire.")
  {
    parent::__construct($message, "0004");
  }
}
