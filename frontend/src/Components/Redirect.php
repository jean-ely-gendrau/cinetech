<?php

namespace App\Cinetech\Components;

/**
 * Redirect
 */
class Redirect
{

  /**
   * Method redirect
   *
   * @param $route $route [la page de déstination]
   *
   * @return void
   */
  public static function  redirect($route)
  {
    header("Location: {$route}");
  }
}
