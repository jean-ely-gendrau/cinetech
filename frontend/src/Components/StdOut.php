<?php

namespace App\Cinetech\Components;

use Symfony\Component\VarDumper\VarDumper;


class StdOut
{

  public static function echo(string $data)
  {
    echo $data;
  }

  public static function dump($data)
  {
    if (ob_get_level() > 0) {

      ob_flush();

      VarDumper::dump($data);

      ob_get_flush();
    } else {

      VarDumper::dump($data);
    }
  }
}
