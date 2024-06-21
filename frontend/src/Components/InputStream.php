<?php

namespace App\Cinetech\Components;

class InputStream
{

  /**
   * @abstract Raw input stream
   */
  protected $input;

  public function __construct(array &$data)
  {
    $this->input = file_get_contents('php://input');

    var_dump($this->input);
  }
}
