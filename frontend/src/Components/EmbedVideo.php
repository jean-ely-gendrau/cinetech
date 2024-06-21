<?php

namespace App\Cinetech\Components;

class EmbedVideo
{

  private static function aspectRation(string $newWidth)
  {
    $widthLarge = 1440;
    $heightLarge = 762;

    return $heightLarge / $widthLarge * intval($newWidth);
  }

  public static function createEmbed(array $data, int $widthVideo = 250)
  {
    return join('', array_map(function ($items) use ($widthVideo) {
      $height = self::aspectRation($widthVideo);
      return "<iframe 
                width='{$widthVideo}' 
                height='{$height}' 
                src='https://www.youtube-nocookie.com/embed/{$items->key}'
                frameborder='0' 
                allow='autoplay; encrypted-media'
                >
                </iframe>";
    }, $data));
  }
}
