<?php

namespace App\Cinetech\Exceptions;

class TemplateNotFound extends \Exception
{
  public function __construct($message = "oops une erreur de templates viens de ce produire.")
  {
    parent::__construct($message, "0003");
  }
}
