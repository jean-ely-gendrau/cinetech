<?php

namespace App\Cinetech\Templates;

use App\Cinetech\Components\HttpRequest;
use App\Cinetech\Components\CineTechHtmlElement;

class DetailsTemplate extends HttpRequest
{
  public function formatGenre(array $genre)
  {
    return join('', array_map(function ($item) {
      return "<span class='bg-gray-100 text-gray-800 text-xs md:text-base font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300'>{$item->name}</span>";
    }, $genre));
  }
  public function color_dom_extract($url)
  {
    $pathInfo = pathinfo($url);


    $imgScale = $pathInfo['extension'] === 'png' ? imagecreatefrompng($url) : imagecreatefromjpeg($url);
    $i = imagescale($imgScale, 50, 50);
    $TailleImageChoisie = getimagesize($url);

    $largeur = 0;
    $hauteur = 0;
    $rouge = 0;
    $vert = 0;
    $bleu = 0;

    for ($x = 0; $x < imagesx($i); $x++) {
      for ($y = 0; $y < imagesy($i); $y++) {


        $rgb = imagecolorat($i, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;

        $rouge += $r;
        $vert += $g;
        $bleu += $b;

        $largeur++;
      }
      $hauteur++;
      $largeur = 0;
    }

    $total_pixel = 50 * 50;
    $rouge = round($rouge / $total_pixel);
    $bleu = round($bleu / $total_pixel);
    $vert = round($vert / $total_pixel);


    $couleur = 'rgb(' . $rouge . ',' . $vert . ',' . $bleu . ')';
    return $couleur;
  }

  public function dominant_color($url)
  {
    $pathInfo = pathinfo($url);

    $i = $pathInfo['extension'] === 'png' ? imagecreatefrompng($url) : imagecreatefromjpeg($url);
    $rTotal  = null;
    $bTotal  = null;
    $gTotal  = null;
    $total = null;
    for ($x = 0; $x < imagesx($i); $x++) {
      for ($y = 0; $y < imagesy($i); $y++) {
        $rgb = imagecolorat($i, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;
        $rTotal += intval($r);
        $gTotal += intval($g);
        $bTotal += intval($b);
        $total++;
      }
    }
    return ['rTotal' => $rTotal, 'bTotal' => $bTotal, 'gTotal' => $gTotal, $total];
  }

  public function Details(...$parameters)
  {
    $isFavorites = false;
    $svgFavorite = $isFavorites ?
      '<svg class="h-12 w-12" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 501.28 501.28" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <polygon style="fill:#FFCD00;" points="501.28,194.37 335.26,159.33 250.64,12.27 250.64,419.77 405.54,489.01 387.56,320.29 "></polygon> <polygon style="fill:#FFDA44;" points="166.02,159.33 0,194.37 113.72,320.29 95.74,489.01 250.64,419.77 250.64,12.27 "></polygon> </g> </g></svg>'
      :
      '<svg class="h-12 w-12" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 501.28 501.28" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <polygon style="fill:#9BC9FF;" points="501.28,194.37 335.26,159.33 250.64,12.27 250.64,419.77 405.54,489.01 387.56,320.29 "></polygon> <polygon style="fill:#BDDBFF;" points="166.02,159.33 0,194.37 113.72,320.29 95.74,489.01 250.64,419.77 250.64,12.27 "></polygon> </g> </g></svg>';

    $page = '<script type="module">
              cineTech.sys.getById("content-main").delClass("md:min-w-2xl").delClass("md:mx-auto").delClass("mx-2").addClass("md:min-w-full");
            </script>';

    switch ($parameters['synergies']):

      case 'films':
        $uriGZ = "/api/movie?movie_id={$parameters['id']}";
        break;

      case 'series':
        $uriGZ = "/api/tv/series/details/?series_id={$parameters['id']}";
        break;

    endswitch;

    $srcImage = "https://image.tmdb.org/t/p/original";
    $resultMovie = self::requestGZ($uriGZ);

    if (!$resultMovie) return false;

    $object = json_decode($resultMovie);


    $page .= "<section class='bg-gray-100 flex flex-row flex-wrap gap-5 max-w-none justify-center items-center'>";

    // foreach ($object as $object) :
    //var_dump($object);
    $title = isset($object->original_title) ? $object->original_title : $object->name;
    $date = isset($object->release_date) ? $object->release_date : 'N/A';
    list($year, $month, $day) = $date !== 'N/A' ? explode('-', $date) : array_fill(0, 3, 'N/A');

    $runtime = 'N/A';
    $runtimeToTime = isset($object->runtime) ? str_pad($object->runtime / 60 * 100, 3, '0', STR_PAD_LEFT) : false;

    if (preg_match('/(\d{1,2})(\d{2})/', $runtimeToTime, $matches)) :
      unset($matches[0]); // Unset pattern regex
      //  dd($matches);


      $page .= "<script>console.log('" . $matches[1] . ' ' . $matches[2] . "');</script>";
      $minute = $matches[2] * 60 / 100; // Convert result in minutes time
      $runtime = sprintf('%1d h %2d m', $matches[1], $minute);
    endif;
    // $thiefColor = $this->color_dom_extract($srcImage . $object->backdrop_path); //[$thiefColor]

    $timeRunTime = !empty($object->episode_run_time)
      ?
      "<article class='my-2 flex flex-row justify-evenly items-center'>
        " . CineTechHtmlElement::formatRoundedSpan(['Durée(' . $object->episode_run_time[0] . ')']) . "
       </article>"
      : "";

    $page .=
      "<section class='relative flex items-center justify-center min-w-full'>

          <section class='relative flex flex-col h-fit bg-white rounded-b-3xl shadow-xl min-w-full'>
              
            <article class='relative grid shadow-sm bg-slate-100 flex-col bg-gradient-to-b from-black/95 from-75%  to-transparent'>
            <!-- BG IMAGE -->
             <img
                src='./assets/images/placeholder.png'
                data-src='" . $srcImage . $object->backdrop_path . "'
                loading='lazy'
                class='opacity-30 min-w-full h-[605px] -z10 justify-center grid object-content'
                alt='{$title}'
                /> 
       
                <!-- IMAGE FRONT -->
                <div class='flex-col absolute md:top-11 md:left-20 md:flex sm:flex-row md:space-x-2  lg:space-x-10'>
                  <img
                    src='./assets/images/placeholder.png'
                    data-src='" . $srcImage . $object->poster_path . "'
                    loading='lazy'
                    class='hidden md:block w-[155px] h-[275px] md:w-[300px] md:h-[450px] lg:w-[325px] lg:h-[475px] object-content'
                    alt='{$title}'
                    /> 

                  <div class='group p-6 grid z-10 text-xl max-w-auto md:max-w-4xl  lg:max-w-6xl h-96 text-white'>
                      
                      <!-- TITLE -->
                     <h1 class='text-ls sm:text-xl md:text-6xl z-10 mb-2 font-semibold'>{$title} ({$year})</h1>

                     <div class='flex flex-row items-center gap-5 mb-4'>
                      <!-- DATE -->
                      <span class='text-slate-400 text-sm md:text-base pt-2 font-semibold'>
                        ({$date})
                      </span>

                      &bull;

                      <!-- GENRE -->
                      <span>
                      {$this->formatGenre($object->genres)}
                      <span>

                      &bull;

                      <!-- GENRE -->
                      <span>
                      $runtime
                      <span>
                    </div>

                    <div class='grid-cols-3 group items-start flex flex-row my-2'>
                      <!-- SCORE -->
                      <div class='font-black flex flex-col justify-center w-1/3 col-span-1'>
                        <span class='text-yellow-500 text-sm sm:text-base md:text-xl'>TMDB SCORE</span>

                        <span class='text-3xl flex gap-x-1 items-center group-hover:text-yellow-600'>
                          {$object->vote_average}
                          <svg width='24px' height='24px' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <g id='SVGRepo_bgCarrier' stroke-width='0'/>
                            <g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'/>
                            <g id='SVGRepo_iconCarrier'> <path d='M9.15316 5.40838C10.4198 3.13613 11.0531 2 12 2C12.9469 2 13.5802 3.13612 14.8468 5.40837L15.1745 5.99623C15.5345 6.64193 15.7144 6.96479 15.9951 7.17781C16.2757 7.39083 16.6251 7.4699 17.3241 7.62805L17.9605 7.77203C20.4201 8.32856 21.65 8.60682 21.9426 9.54773C22.2352 10.4886 21.3968 11.4691 19.7199 13.4299L19.2861 13.9372C18.8096 14.4944 18.5713 14.773 18.4641 15.1177C18.357 15.4624 18.393 15.8341 18.465 16.5776L18.5306 17.2544C18.7841 19.8706 18.9109 21.1787 18.1449 21.7602C17.3788 22.3417 16.2273 21.8115 13.9243 20.7512L13.3285 20.4768C12.6741 20.1755 12.3469 20.0248 12 20.0248C11.6531 20.0248 11.3259 20.1755 10.6715 20.4768L10.0757 20.7512C7.77268 21.8115 6.62118 22.3417 5.85515 21.7602C5.08912 21.1787 5.21588 19.8706 5.4694 17.2544L5.53498 16.5776C5.60703 15.8341 5.64305 15.4624 5.53586 15.1177C5.42868 14.773 5.19043 14.4944 4.71392 13.9372L4.2801 13.4299C2.60325 11.4691 1.76482 10.4886 2.05742 9.54773C2.35002 8.60682 3.57986 8.32856 6.03954 7.77203L6.67589 7.62805C7.37485 7.4699 7.72433 7.39083 8.00494 7.17781C8.28555 6.96479 8.46553 6.64194 8.82547 5.99623L9.15316 5.40838Z' fill='#eab308'/> </g>
                          </svg>
                        </span>

                      </div>

                      <!-- BUTTON ACTIONS -->
                      <div class='font-black flex flex-row gap-5 col-span-1 w-1/3 justify-center items-center'>
                        {$svgFavorite}
                        <svg class='h-14 w-14 mt-5' version='1.1' id='_x36_' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 512 512' xml:space='preserve' fill='#000000'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <g> <g> <g> <circle style='fill:#FDF4DE;' cx='255.693' cy='134.136' r='134.136'></circle> <path style='fill:#B0DCD7;' d='M257.535,79.113H182.64c-6.078,0-11.05-4.973-11.05-11.05l0,0c0-6.077,4.973-11.05,11.05-11.05 h74.895c6.078,0,11.05,4.973,11.05,11.05l0,0C268.585,74.14,263.612,79.113,257.535,79.113z'></path> <path style='fill:#B0DCD7;' d='M244.643,126.076h-74.895c-6.077,0-11.05-4.973-11.05-11.05l0,0c0-6.077,4.973-11.05,11.05-11.05 h74.895c6.077,0,11.05,4.973,11.05,11.05l0,0C255.693,121.103,250.72,126.076,244.643,126.076z'></path> <path style='fill:#B0DCD7;' d='M351.461,176.722H169.748c-6.077,0-11.05-4.973-11.05-11.05l0,0c0-6.078,4.973-11.05,11.05-11.05 h181.713c6.077,0,11.05,4.973,11.05,11.05l0,0C362.511,171.749,357.538,176.722,351.461,176.722z'></path> <path style='fill:#B0DCD7;' d='M270.887,212.635h-86.866c-6.078,0-11.05-4.973-11.05-11.05l0,0c0-6.078,4.973-11.05,11.05-11.05 h86.866c6.078,0,11.05,4.973,11.05,11.05l0,0C281.937,207.662,276.965,212.635,270.887,212.635z'></path> <path style='fill:#B0DCD7;' d='M349.619,126.076h-74.895c-6.078,0-11.05-4.973-11.05-11.05l0,0c0-6.077,4.972-11.05,11.05-11.05 h74.895c6.077,0,11.05,4.973,11.05,11.05l0,0C360.669,121.103,355.696,126.076,349.619,126.076z'></path> <polygon style='fill:#FDF4DE;' points='209.185,252.621 282.019,241.572 284.185,311.096 '></polygon> </g> <path style='fill:#B0DCD7;' d='M186.636,272.351c-14.07,14.07-31.953,24.347-51.991,29.117l-48.584,37.883l1.16-37.11 C37.441,292.039,0,247.986,0,195.203C0,134.851,48.933,85.918,109.285,85.918h0.055c-4.199,14.328-6.446,29.485-6.446,45.177 C102.895,191.999,136.727,245.021,186.636,272.351z'></path> <path style='fill:#B0DCD7;' d='M325.364,272.351c14.07,14.07,31.953,24.347,51.991,29.117l48.584,37.883l-1.16-37.11 C474.559,292.039,512,247.986,512,195.203c0-60.352-48.934-109.285-109.285-109.285h-0.055 c4.199,14.328,6.446,29.485,6.446,45.177C409.105,191.999,375.273,245.021,325.364,272.351z'></path> </g> <g style='opacity:0.04;'> <path style='fill:#070405;' d='M389.829,134.136c0-27.879-8.515-53.763-23.072-75.216L180.623,245.053 c13.122,8.877,27.842,15.574,43.714,19.382l59.847,46.661l-1.419-45.56C343.869,253.013,389.829,198.943,389.829,134.136z'></path> <path style='fill:#070405;' d='M87.256,338.42l47.389-36.952c20.037-4.77,37.92-15.046,51.991-29.117 c-7.07-3.871-13.774-8.311-20.148-13.163L87.256,338.42z'></path> <path style='fill:#070405;' d='M512,195.203c0-60.352-48.934-109.286-109.286-109.286h-0.055 c4.199,14.328,6.446,29.485,6.446,45.177c0,60.904-33.832,113.926-83.741,141.257c14.07,14.07,31.953,24.347,51.991,29.117 l48.584,37.884l-1.16-37.11C474.559,292.039,512,247.986,512,195.203z'></path> </g> </g> </g></svg>
                      </div>

                      <!-- ORIGINAL LANG -->
                      <div class='flex flex-col items-end justify-center col-span-1 w-1/3 mt-5'>
                        <div class='h-7'>
                          <span class='text-3xl  font-bold  gap-x-2 text-slate-300'>
                            # {$object->original_language}
                          </span>
                        </div>
                      </div>

                    </div>

                    <div class='min-h-28 max-h-28 my-4 w-full space-y-2'>
                    <p class='text-xl'>{$object->tagline}</p>

                    <h3 class='text-4xl font-bold text-slate-400'>Synopsis</h3>

                    <!-- DESCRIPTION -->
                    <span class='line-clamp-2 py-2 my-3 text-sm sm:text-base md:text-lg lg:text-xl font-light leading-relaxed overflow-y-auto min-h-28 max-h-28 z-20'>
                      {$object->overview}  
                    </span>

                  </div>
                  

                    <!-- PRODUCTION -->
                    <article class='flex lg:flex md:flex-row flex-nowrap justify-evenly items-end md:overflow-x-auto h-32 my-4 py-2 z-10'>
                    " . CineTechHtmlElement::elementProduction($object->production_companies) . "
                    </article>
                    
                  </div>
           
                </div>
             
            </article>

          </section>
      </section>";

    // endforeach;

    $page .= "</section>";


    // titleSpan formatage du titre dans les bloc d'affichage
    $titleSpan = "<span class='text-base text-slate-600 font-extrabold'>{$title}</span>";
    // Video

    if (!empty($object->credits->cast)) :
      $sliceCast = array_slice($object->credits->cast, 0, 10);
      //dd($sliceCast);
      $page .=  CineTechHtmlElement::contentScrollX($object->credits->cast, "Les crédits de {$titleSpan}", $parameters, 'credits-cast-view', 'elementCreditScrollX', ['url' => '#', 'title' => "Voir tout les crédits de {$title}", 'name' => "Voir plus"]);

    endif;

    if (!empty($object->videos->results)) :
      /*
      $page  .= "<section class='bg-gray-100 grid grid-cols-2 gap-5 justify-between items-center w-4/5 mx-auto'>";
      $page .= "<h2 class='text-base md:text-2xl lg:text-4xl col-span-1 me-5'>Bande annonce {$title}</h2>";

      $page .= CineTechHtmlElement::buttonScrollX('videos-trailer-view');

      $page .= "<article id='videos-trailer-view' class='col-span-2'>";
      $page .= "<span class='flex flex-row gap-x-5 justify-start items-center overflow-x-auto my-2 py-2 bg-repeat'>" . EmbedVideo::createEmbed($object->videos->results) . "</span>";
      $page .= "</article>";

      $page .= "</section>";

    //echo $page;
    */
      $page .=  CineTechHtmlElement::contentScrollX($object->videos->results, "Les vidéos similaires {$titleSpan}", $parameters, 'videos-trailer-view', 'createEmbed');

    endif;

    // Seasons
    if (!empty($object->seasons)) :
      /*
      $page  .= "<section class='bg-gray-100 grid grid-cols-2 gap-5 justify-between items-center w-4/5 mx-auto'>";
      $page .= "<h2 class='text-base md:text-2xl lg:text-4xl col-span-1 me-5'>Toutes les Season {$title}</h2>";
      $page .= CineTechHtmlElement::buttonScrollX('series-season-view');

      $page .= "<article id='series-season-view' class='flex flex-row gap-x-5 justify-start items-center overflow-x-auto my-2 py-2'>";
      $page .=  CineTechHtmlElement::elementSeason($object->seasons, $parameters['synergies']);
      $page .= "</article>";

      $page .= "</section>";

    // echo $page;
    */
      $page .=  CineTechHtmlElement::contentScrollX($object->seasons, "Bande annonce {$titleSpan}", $parameters, 'series-season-view', 'elementSeason');

      $page .= "<img class='rounded-3xl opacity-75 object-cover w-full' src=" . self::requestGZ('/api/g/images') . " />";
    endif;

    // Similar
    if (!empty($object->similar->results)) :
      /*
      $page  .= "<section class='bg-gray-100 grid grid-cols-2 gap-5 justify-between items-center w-4/5 mx-auto'>";
      $page .= "<h2 class='text-base md:text-2xl lg:text-4xl col-span-1 me-5'>Les vidéos similaires {$title}</h2>";
      $page .= CineTechHtmlElement::buttonScrollX('series-view');

      $page .= "<article id='series-view' class='col-span-2 flex flex-row gap-x-5 justify-start items-center overflow-x-auto my-2 py-2'>";
      $page .=  CineTechHtmlElement::elementScrollX($object->similar->results, $parameters['synergies']);
      $page .= "</article>";

      $page .= "</section>";

    // echo $page;
    */
      $options = ['view' => true, 'method' => 'buttonSwitch', 'arguments' => ['idElement' => 'series-view', 'selectedMenu' => 'Tendances']];
      $page .= CineTechHtmlElement::contentScrollX($object->similar->results, "Les vidéos similaires {$titleSpan}", $parameters, 'series-view', 'elementScrollX', [], $options);

    endif;


    // Similar
    if (!empty($object->recommendations->results)) :
      /*
          $page  .= "<section class='bg-gray-100 grid grid-cols-2 gap-5 justify-between items-center w-4/5 mx-auto'>";
          $page .= "<h2 class='text-base md:text-2xl lg:text-4xl col-span-1 me-5'>Les vidéos similaires {$title}</h2>";
          $page .= CineTechHtmlElement::buttonScrollX('series-view');
    
          $page .= "<article id='series-view' class='col-span-2 flex flex-row gap-x-5 justify-start items-center overflow-x-auto my-2 py-2'>";
          $page .=  CineTechHtmlElement::elementScrollX($object->similar->results, $parameters['synergies']);
          $page .= "</article>";
    
          $page .= "</section>";
    
        // echo $page;
        */
      $page .= CineTechHtmlElement::contentScrollX($object->recommendations->results, "Recommandations", $parameters, 'recomandation-view', 'elementScrollX');

      $page .= "<img class='w-4/5 mx-auto rounded-3xl opacity-75 object-cover' src=" . self::requestGZ('/api/g/images') . " />";
    endif;

    file_put_contents($parameters['synergies'] . '.json', json_encode($object), JSON_PRETTY_PRINT);
    return $page;
    //  echo '<pre>', var_dump($object), '</pre>';
  }
}
