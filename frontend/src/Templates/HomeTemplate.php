<?php

namespace App\Cinetech\Templates;

use App\Cinetech\Components\CineTechHtmlElement;
use App\Cinetech\Components\HttpRequest;


class HomeTemplate extends HttpRequest
{
  public function indexA()
  {
    $srcImage = "https://image.tmdb.org/t/p/original/";
    $resultMovie = self::requestGZ('api/movie/discover');

    if (!$resultMovie) return false; // Error request

    $page = "
        <h1 class='text-base md:text-2xl mb-2'>Accueil CineTech La PlateForme</h1>

        <p>Bienvenue sur le project de formation CineTech La Plateforme.</p>
        ";

    $object = json_decode($resultMovie);

    $page .= "<section class='bg-gray-100 flex flex-row flex-wrap gap-5 max-w-none mx-2 justify-center items-center'>";

    foreach ($object->results as $iemMovie) :

      $page .=
        "<div class=bg-gray-100 py-6 flex flex-col justify-center sm:py-12 w-[200px] h-fit'>
  
            <div class='py-3 sm:max-w-sm sm:mx-auto'>

              <div class='bg-white shadow-lg border-gray-100 max-h-80 border sm:rounded-3xl p-8 flex space-x-8'>

                <div class='h-auto overflow-visible w-1/2'>
                    <img class='object-contain h-60 rounded-3xl shadow-lg' src='" . $srcImage . $iemMovie->backdrop_path . "' alt='{$iemMovie->original_title}'>
                </div>

                <div class='flex flex-col w-1/2 space-y-4'>

                  <div class='flex justify-between items-start'>
                    <h2 class='text-3xl font-bold'>{$iemMovie->original_title}</h2>
                    <div class='bg-yellow-400 font-bold rounded-xl p-2'>{$iemMovie->vote_average}</div>
                  </div>

                  <div>
                    <div class='text-sm text-gray-400'>Film</div>
                    <div class='text-lg text-gray-800'>{$iemMovie->release_date}</div>
                  </div>
                  
                    <p class=' text-gray-400 max-h-40 overflow-y-hidden'>{$iemMovie->overview}</p>
                  <div class='flex text-2xl font-bold text-a'>{$iemMovie->original_language}</div>

                </div>
          
              </div>
            </div>
            
      </div>";

    endforeach;

    $page .= "</section>";

    return $page;
  }

  public function indexB()
  {
    $srcImage = "https://image.tmdb.org/t/p/original/";
    $resultMovie = self::requestGZ('api/movie/discover');

    if (!$resultMovie) return false; // Error Request

    $page = "
        <h1 class='text-base md:text-2xl mb-2'>Accueil CineTech La PlateForme</h1>

        <p>Bienvenue sur le project de formation CineTech La Plateforme.</p>
        ";

    $object = json_decode($resultMovie);

    $page .= "<section class='bg-gray-100 flex flex-row flex-wrap gap-5 max-w-none mx-2 justify-center items-center'>";

    foreach ($object->results as $iemMovie) :

      $page .=
        "<div class='flex items-center justify-center mx-auto max-w-[370px]'>
          <div class='flex flex-col h-fit mx-auto bg-white rounded-3xl shadow-xl'>
            <div class='grid rounded-3xl max-w-[370px] shadow-sm bg-slate-100 flex-col'>
              <img
                src='" . $srcImage . $iemMovie->backdrop_path . "'
                width='375'
                height='200'
                class='rounded-t-3xl justify-center grid h-80 object-cover'
                alt='{$iemMovie->original_title}'
                /> 
              
                <div class='group p-6 grid z-10  h-96'>
                  <a
                  href='#'
                  class='group-hover:text-cyan-700 font-bold sm:text-2xl line-clamp-2'
                  >
                    {$iemMovie->original_title}
                  </a>
                  <span class='text-slate-400 pt-2 font-semibold'>
                    ({$iemMovie->release_date})
                  </span>
                  <div class='min-h-28 max-h-28'>
                    <span class='line-clamp-4 py-2 text-sm font-light leading-relaxed overflow-y-auto min-h-28 max-h-28'>
                      {$iemMovie->overview}
                    </span>
                  </div>
                  <div class='grid-cols-2 group justify-between'>
                    <div class='font-black flex flex-col'>
                      <span class='text-yellow-500 text-xl'>IMDB SCORE</span>
                      <span class='text-3xl flex gap-x-1 items-center group-hover:text-yellow-600'>
                        {$iemMovie->vote_average}
                        <svg width='24px' height='24px' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                          <g id='SVGRepo_bgCarrier' stroke-width='0'/>
                          <g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'/>
                          <g id='SVGRepo_iconCarrier'> <path d='M9.15316 5.40838C10.4198 3.13613 11.0531 2 12 2C12.9469 2 13.5802 3.13612 14.8468 5.40837L15.1745 5.99623C15.5345 6.64193 15.7144 6.96479 15.9951 7.17781C16.2757 7.39083 16.6251 7.4699 17.3241 7.62805L17.9605 7.77203C20.4201 8.32856 21.65 8.60682 21.9426 9.54773C22.2352 10.4886 21.3968 11.4691 19.7199 13.4299L19.2861 13.9372C18.8096 14.4944 18.5713 14.773 18.4641 15.1177C18.357 15.4624 18.393 15.8341 18.465 16.5776L18.5306 17.2544C18.7841 19.8706 18.9109 21.1787 18.1449 21.7602C17.3788 22.3417 16.2273 21.8115 13.9243 20.7512L13.3285 20.4768C12.6741 20.1755 12.3469 20.0248 12 20.0248C11.6531 20.0248 11.3259 20.1755 10.6715 20.4768L10.0757 20.7512C7.77268 21.8115 6.62118 22.3417 5.85515 21.7602C5.08912 21.1787 5.21588 19.8706 5.4694 17.2544L5.53498 16.5776C5.60703 15.8341 5.64305 15.4624 5.53586 15.1177C5.42868 14.773 5.19043 14.4944 4.71392 13.9372L4.2801 13.4299C2.60325 11.4691 1.76482 10.4886 2.05742 9.54773C2.35002 8.60682 3.57986 8.32856 6.03954 7.77203L6.67589 7.62805C7.37485 7.4699 7.72433 7.39083 8.00494 7.17781C8.28555 6.96479 8.46553 6.64194 8.82547 5.99623L9.15316 5.40838Z' fill='#eab308'/> </g>
                        </svg>
                      </span>
                    </div>
                    <div class='flex flex-col items-end'>
                      <div class='h-7' />
                        <span class='text-3xl  font-bold  gap-x-2 text-slate-300'>
                          # {$iemMovie->original_language}
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
           </div>
          </div>
        </div>";

    endforeach;

    $page .= "</section>";

    return $page;
  }
  public function decodePng($data)
  {
    // Création du blob
    $blob = new \stdClass();
    $blob->buffer = $data;
    $blob->type = 'application/octet-binary';

    // Création d'un fichier temporaire
    $tempFile = tempnam(sys_get_temp_dir(), 'image');
    file_put_contents($tempFile, $blob->buffer);

    // Renvoi de l'URL du fichier temporaire
    $link = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI'])  . basename($tempFile);

    // Utilisation de l'URL pour l'image
    return '<img src="' . $link . '" />';
  }
  public function decodeImg($data)
  {
    // Création du blob
    $blob = new \stdClass();
    $blob->buffer = $data;
    $blob->type = 'application/octet-binary';

    // Création de l'URL
    $link = 'data:application/octet-binary;base64,' . base64_encode($blob->buffer);

    // Création de l'image
    $img = imagecreatefromstring($blob->buffer);

    // Affichage de l'image (ou autre traitement)
    ob_start();
    // header('Content-Type: image/png'); // Adapter le type MIME selon le type d'image
    $imgs = imagepng($img);

    // Libération de la mémoire
    //imagedestroy($img);
    return $imgs;
  }

  public function headerHtml(string $srcImage, string $altImage, string $title)
  {
    return "
    <div class='flex flex-col justify-between mt-4 bg-black/10 bg-blend-multiply rounded-3xl h-80 overflow-hidden bg-cover bg-center px-7 pt-4 pb-6 text-white'
                    style='background-image: url({$srcImage});' >
                    <span class='sr-only'>Image d'entête' du film {$altImage}</span>
                    <!-- <img class='object-cover w-full h-full' src='{$srcImage}' alt='{$altImage}'> -->
                  
                    
                    <div class='bg-gradient-to-r from-black/30 to-transparent -mx-7 -mb-6 px-7 pb-6 pt-2'>
                        <span class='uppercase text-3xl font-semibold drop-shadow-lg '>{$title}</span>
                        <div class='text-xs text-gray-200 mt-2'>
                            <a href='#' class=''>Action</a>,
                            <a href='#' class=''>Adventure</a>,
                            <a href='#' class=''>Sci-Fi</a>
                        </div>
                        <div class='mt-4 flex space-x-3 items-center'>
                            <a href='#' class='px-5 py-2.5 bg-red-600 hover:bg-red-700 rounded-lg text-xs inline-block'>Regarder</a>
                            <a href='#' class='p-2.5 bg-gray-800/80 rounded-lg hover:bg-red-600'>
                                <svg xmlns='http://www.w3.org/2000/svg' class='h-4 w-4' viewBox='0 0 20 20' fill='currentColor'>
                                    <path fill-rule='evenodd' d='M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z' clip-rule='evenodd' />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>";
  }
  public function index(...$arguments)
  {
    //var_dump($arguments);
    $srcImage = "https://image.tmdb.org/t/p/original";
    $resultMovie = self::requestGZ('/api/movie/now');

    if (!$resultMovie) return false; // Error Request

    $imageBG = self::requestGZ('/api/g/images/bg');
    $object = json_decode($resultMovie);
    /*
    $dom = new DOMDocument();
    $dom->loadHTML($object->canvas->htmlElement);



    $result = $dom->saveHTML();
    var_dump($result);
*/
    //var_dump($object->canvas);
    $page = "<section id='headerElement' class='relative flex flex-col justify-center text-white items-center rounded-3xl bg-gradient-to-e w-full h-auto bg-gradient-to-b from-black/50 from-75%  to-transparent'>";
    $page .= "<div class='absolute inset-0 flex flex-col items-center justify-center'>";
    $page .= " <h1 class='text-base md:text-6xl mb-8 px-4 text-shadow-md shadow-black font-medium'>Bienvenue, sur CineTech</h1>";
    $page .= "<p class='text-base md:text-2xl text-shadow-md shadow-black mb-2 font-extralight'>à la découverte de millions de films, émissions télévisées et artistes...</p>";
    $page .= "<input class='w-2/3 rounded-full h-10 p-4 text-sm md:text-lg' type='text' placeholder='Rechercher un film, série TV, épisodes, artistes ...' />";
    $page .= "</div>";

    //$page .= self::decodePng(base64_decode($object->canvas));
    $page .= "<img class='-z-10 rounded-3xl opacity-75 object-cover w-full' src={$imageBG} />";
    /*
    $page .= "<canvas class='-z-10 min-w-full opacity-50' id='canvas' width='900' height='300'>

              </canvas>";
              */
    $page .= "</section>";

    // $page .= "<section class='bg-gray-100 flex-col max-w-none'>";
    /*
    $page .=
      "<div class='flex justify-between'>
      <div class='inline-flex rounded-lg shadow-sm'>
        <button type='button' class='py-1 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-full first:ms-0 last:rounded-e-full text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-50 dark:border-gray-700 dark:text-blue-900 dark:hover:bg-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 dark:focus:bg-gray-400 dark:focus:text-white'>
          Aujoud'hui
        </button>
        <button type='button' class='py-1 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-full first:ms-0 last:rounded-e-full text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-50 dark:border-gray-700 dark:text-blue-900 dark:hover:bg-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:bg-gray-400 dark:focus:text-white'>
          Cette Semaine
        </button>
    </div>";
    $page .= CineTechHtmlElement::buttonScrollX('film-view');
    $page .= " </div>";

*/
    $arguments['synergies'] = 'films';
    $options = ['view' => true, 'method' => 'buttonSwitch', 'arguments' => ['idElement' => 'film-view', 'selectedMenu' => 'Tendances']];
    $page .=  CineTechHtmlElement::contentScrollX($object->results, "Les films tendances", $arguments, 'film-view', 'elementScrollX', [], $options, 'w-full');
    //   $page .= "<article id='film-view' class='flex flex-row gap-x-5 justify-start items-center overflow-x-auto my-2 py-2'>";

    /*
    foreach ($object->results as $iemMovie) :
      $title = isset($iemMovie->original_title) ? $iemMovie->original_title : $iemMovie->name;
      $date = isset($iemMovie->release_date) ? $iemMovie->release_date : "N/A";
      $page .= "
        <div class='flex items-center justify-center mx-auto w-[155px]'>
          <div class='flex flex-col mx-auto '>
            <div class='rounded-3xl w-[150px] shadow-sm flex-col'>
            <img
                src='./assets/images/placeholder.png'
                data-src='" . $srcImage . $iemMovie->backdrop_path . "'
                loading='lazy'
                class='shadow-md rounded-3xl justify-center h-[225px] w-[150px] grid object-cover'
                alt='{$title}'
                />   
              
                <div class='flex-col p-4 grid z-10 text-left h-32 content-between'>
                  <a
                  href='./film/{$title}-{$iemMovie->id}'
                  class='group-hover:text-cyan-700 font-semibold text-xs sm:text-[1em] line-clamp-3'
                  >
                    {$title}
                  </a>
                  <time class='text-slate-400 pt-2 font-semibold'>
                    ({$date})
                  </time>
                </div>
            </div>
          </div> 
        </div>";

    endforeach;
*/
    /* The above code is concatenating the results of a method call to the `` variable. The method
   `CineTechHtmlElement::elementScrollX()` is being called with the parameter `->results`,
   and the result of this method call is being appended to the existing value of the ``
   variable. */
    //    $page .= CineTechHtmlElement::elementScrollX($object->results, 'films');
    //  $page .= "</article>";
    //$page .= "</section>";


    $page .= "<article class='bg-gray-100 flex-col max-w-none'>";
    $imageStatic = self::requestGZ('/api/g/images');
    $page .= "<img class='-z-10 rounded-3xl opacity-75 object-cover w-full' src={$imageStatic} />";
    $page .= "</article>";


    /*
    $resultMovieClip = self::requestGZ('api/movie/videos');
    $objectSeriesMovieClip = json_decode($resultMovieClip);
    var_dump($objectSeriesMovieClip);
*/
    $resultSeries = self::requestGZ('/api/tv/series/lists/airing_today');

    if (!$resultSeries) return false; // Error Request

    if (!$resultSeries) return false;

    $objectSeries = json_decode($resultSeries);
    /*
    $page .= "<section class='bg-gray-100 flex-col gap-x-5 max-w-none px-2'>";

    $page .= "<h2 class='text-base md:text-2xl'>Les Séries TV du jour</h2>";
    $page .=
      "<div class='flex justify-between'>
      <div class='inline-flex rounded-lg shadow-sm'>
        <button type='button' class='py-1 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-full first:ms-0 last:rounded-e-full text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-50 dark:border-gray-700 dark:text-blue-900 dark:hover:bg-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 dark:focus:bg-gray-400 dark:focus:text-white'>
          Aujoud'hui
        </button>
        <button type='button' class='py-1 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-full first:ms-0 last:rounded-e-full text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-50 dark:border-gray-700 dark:text-blue-900 dark:hover:bg-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:bg-gray-400 dark:focus:text-white'>
          Cette Semaine
        </button>
    </div>";
    $page .= CineTechHtmlElement::buttonScrollX('series-view');
    $page .= " </div>";
*/

    //   $page .= "<article id='series-view' class='flex flex-row gap-x-5 justify-start items-center overflow-x-auto my-2 py-2'>";
    /*
    foreach ($objectSeries->results as $iemMovie) :
      $title = isset($iemMovie->original_title) ? $iemMovie->original_title : $iemMovie->name;
      $date = isset($iemMovie->release_date) ? $iemMovie->release_date : "N/A";
      $page .= "
        <div class='flex items-center justify-center mx-auto w-[155px]'>
          <div class='flex flex-col mx-auto'>
            <div class='rounded-3xl w-[150px] shadow-sm flex-col'>
              <img
                src='./assets/images/placeholder.png'
                data-src='" . $srcImage . $iemMovie->backdrop_path . "'
                loading='lazy'
                class='rounded-3xl justify-center h-[225px] w-[150px] grid object-cover'
                alt='{$title}'
                /> 
              
                <div class='group p-6 grid z-10 text-left'>
                  <a
                  href='#'
                  class='group-hover:text-cyan-700 font-semibold text-xs sm:text-[1em] line-clamp-2'
                  >
                    {$title}
                  </a>
                  <span class='text-slate-400 pt-2 font-semibold'>
                    ({$date})
                  </span>
                </div>
            </div>
          </div> 
        </div>";

    endforeach;
*/
    //   $page .= CineTechHtmlElement::elementScrollX($objectSeries->results, 'series');
    //    $page .= "</article>";
    //   $page .= "</section>";
    $arguments['synergies'] = 'series';
    $options = ['view' => true, 'method' => 'buttonSwitch', 'arguments' => ['idElement' => 'series-view-home', 'selectedMenu' => 'Populaires']];
    $page .=  CineTechHtmlElement::contentScrollX($objectSeries->results, "Les Séries TV", $arguments, 'series-view-home', 'elementScrollX', [], $options, 'w-full');


    $page .= "<article class='bg-gray-100 flex-col max-w-none'>";
    $imageStatic1 = self::requestGZ('/api/g/images');
    $page .= "<img class='-z-10 rounded-3xl opacity-75 object-cover w-full' src={$imageStatic1} />";
    $page .= "</article>";

    return $page;
  }
}
