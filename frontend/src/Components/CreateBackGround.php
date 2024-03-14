<?php

namespace App\Cinetech\Components;

class CreateBackGround
{
  public static function createBG(array $tempImg)
  {
    //	envoi du header approprié au navigateur
    header("Content-type: image/png");

    //	images source
    $file1 = $tempImg[0];
    $file2 = $tempImg[1];

    $img_finale = imagecreatetruecolor(700, 300);

    //	chargement des images
    $img1 = imagecreatefromjpeg($file1);
    $img2 = imagecreatefrompng($file2);

    //	tailles des images
    $img1_size = getimagesize($file1);
    $img2_size = getimagesize($file2);

    // copie des sources vers l'image finale
    imagecopy($img_finale, $img1, 0, 0, 0, 0, $img1_size[0], $img1_size[1]);
    imagecopy($img_finale, $img2, $img1_size[0], 0, 0, 0, $img2_size[0], $img2_size[1]);

    //	envoi de l'image au navigateur
    return imagepng($img_finale);
  }
}
