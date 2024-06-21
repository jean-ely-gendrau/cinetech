<?php

namespace App\Cinetech\Exceptions;

class RouteFoundException extends \Exception
{
  public function __construct($message = "Vous essayez de suivre plusieur destination, une erreur c'est produite.")
  {
    parent::__construct($message, "0001");
  }
}
