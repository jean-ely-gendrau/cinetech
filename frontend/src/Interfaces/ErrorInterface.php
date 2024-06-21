<?php

namespace App\Cinetech\Interfaces;

interface ErrorInterface
{


  /**
   * @param string $key
   * @return mixed
   */
  public function getError(object $errors, string $key);
}
