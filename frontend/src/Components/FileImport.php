<?php

namespace App\Cinetech\Components;

class FileImport
{

  /**
   * Method getFile
   *
   * @param string $filePath [chemi du fichier à partir du répertoir frontend]
   * @param bool $array [true si les donnée son retourner en array assosiative]
   *
   * @return mixed
   */
  public static function getFile(string $filePath, bool $array = false): mixed
  {
    $getFile = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "../../{$filePath}");
    return $array ? json_decode($getFile, true) : json_decode($getFile);
  }
}
