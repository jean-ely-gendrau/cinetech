<?php

namespace App\Cinetech\Components;

use App\Cinetech\Components\EmbedVideo;
use App\Cinetech\Components\ConstantApp;

class CineTechHtmlElement
{

  public static function formatRoundedSpan(array $items)
  {
    return join('', array_map(function ($item) {
      return "<span class='truncate max-w-32 min-w-32 text-center bg-gray-100 text-gray-800 text-xs md:text-base font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300'>{$item}</span>";
    }, $items));
  }

  public static function buttonSwitch(string $idElement, string $selectedMenu)
  {
    switch ($selectedMenu):
      case 'Tendances':
        return
          "<div class='col-span-1 flex justify-start '>
              <div class='inline-flex rounded-lg shadow-sm'>
                <button data-js='handelSelectScroll,click' data-action-select='today' data-scroll-x='{$idElement}' type='button' class='truncate py-1 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-full first:ms-0 last:rounded-e-full text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-50 dark:border-gray-700 dark:text-blue-900 dark:hover:bg-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 dark:focus:bg-gray-400 dark:focus:text-white'>
                aujoud'hui
                </button>
                <button data-js='handelSelectScroll,click' data-action-select='week' data-scroll-x='{$idElement}' type='button' class='truncate py-1 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-full first:ms-0 last:rounded-e-full text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-50 dark:border-gray-700 dark:text-blue-900 dark:hover:bg-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:bg-gray-400 dark:focus:text-white'>
                cette Semaine
                </button>
              </div>
            </div>";
      case 'Populaires':
        return
          "<div class='col-span-1 flex justify-start '>
            <div class='inline-flex rounded-lg shadow-sm'>
              <button data-js='handelSelectScroll,click' data-action-select='on-stream' data-select-element='{$idElement}' type='button' class='truncate py-1 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-full first:ms-0 last:rounded-e-full text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-50 dark:border-gray-700 dark:text-blue-900 dark:hover:bg-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 dark:focus:bg-gray-400 dark:focus:text-white'>
                en streaming
              </button>
              <button data-js='handelSelectScroll,click' data-action-select='on-tv' data-select-element='{$idElement}' type='button' class='truncate py-1 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-full first:ms-0 last:rounded-e-full text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-50 dark:border-gray-700 dark:text-blue-900 dark:hover:bg-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:bg-gray-400 dark:focus:text-white'>
                à la télévision
              </button>
              <button data-js='handelSelectScroll,click' data-action-select='to-rent' data-select-element='{$idElement}' type='button' class='truncate py-1 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-full first:ms-0 last:rounded-e-full text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-50 dark:border-gray-700 dark:text-blue-900 dark:hover:bg-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:bg-gray-400 dark:focus:text-white'>
                à louer
              </button>
              <button data-js='handelSelectScroll,click' data-action-select='on-cinema' data-select-element='{$idElement}' type='button' class='truncate py-1 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-full first:ms-0 last:rounded-e-full text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-50 dark:border-gray-700 dark:text-blue-900 dark:hover:bg-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:bg-gray-400 dark:focus:text-white'>
                au cinéma
              </button>
            </div>
          </div>";
      case 'Gratuits':
        return
          "<div class='col-span-1 flex justify-start '>
              <div class='inline-flex rounded-lg shadow-sm'>
                <button data-js='handelSelectScroll,click' data-action-select='films' data-select-element='{$idElement}' type='button' class='truncate py-1 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-full first:ms-0 last:rounded-e-full text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-50 dark:border-gray-700 dark:text-blue-900 dark:hover:bg-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 dark:focus:bg-gray-400 dark:focus:text-white'>
                  films
                </button>
                <button data-js='handelSelectScroll,click' data-action-select='programme-tv' data-select-element='{$idElement}' type='button' class='truncate py-1 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-full first:ms-0 last:rounded-e-full text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-50 dark:border-gray-700 dark:text-blue-900 dark:hover:bg-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:bg-gray-400 dark:focus:text-white'>
                  émission télévisées
                </button>
              </div>
          </div>";
      case 'BandesAnnonces':
        return
          "<div class='col-span-1 flex justify-start '>
              <div class='inline-flex rounded-lg shadow-sm'>
                <button data-js='handelSelectScroll,click' data-action-select='ba-popular' data-select-element='{$idElement}' type='button' class='truncate py-1 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-full first:ms-0 last:rounded-e-full text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-50 dark:border-gray-700 dark:text-blue-900 dark:hover:bg-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 dark:focus:bg-gray-400 dark:focus:text-white'>
                  populaires
                </button>
                <button data-js='handelSelectScroll,click' data-action-select='ba-on-stream' data-select-element='{$idElement}' type='button' class='truncate py-1 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-full first:ms-0 last:rounded-e-full text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-50 dark:border-gray-700 dark:text-blue-900 dark:hover:bg-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:bg-gray-400 dark:focus:text-white'>
                  en streaming
                </button>
                <button data-js='handelSelectScroll,click' data-action-select='ba-on-tv' data-select-element='{$idElement}' type='button' class='truncate py-1 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-full first:ms-0 last:rounded-e-full text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-50 dark:border-gray-700 dark:text-blue-900 dark:hover:bg-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:bg-gray-400 dark:focus:text-white'>
                  à la télévision
                </button>
                <button data-js='handelSelectScroll,click' data-action-select='ba-to-rent' data-select-element='{$idElement}' type='button' class='truncate py-1 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-full first:ms-0 last:rounded-e-full text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-50 dark:border-gray-700 dark:text-blue-900 dark:hover:bg-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:bg-gray-400 dark:focus:text-white'>
                  à louer
                </button>
                <button data-js='handelSelectScroll,click' data-action-select='ba-on-cinema' data-select-element='{$idElement}' type='button' class='truncate py-1 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-full first:ms-0 last:rounded-e-full text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-50 dark:border-gray-700 dark:text-blue-900 dark:hover:bg-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:bg-gray-400 dark:focus:text-white'>
                  au cinéma
                </button>
              </div>
          </div>";
    endswitch;
  }

  public static function buttonScrollX(string $idElement)
  {
    return
      "<div class='col-span-1 flex justify-end '>
        <div class='inline-flex rounded-lg shadow-sm'>
          <button data-js='handelScrollX,click' data-direction-scroll='l' data-scroll-x='{$idElement}' type='button' class='py-1 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-full first:ms-0 last:rounded-e-full text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-50 dark:border-gray-700 dark:text-blue-900 dark:hover:bg-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 dark:focus:bg-gray-400 dark:focus:text-white'>
            <
          </button>
          <button data-js='handelScrollX,click' data-direction-scroll='r' data-scroll-x='{$idElement}' type='button' class='py-1 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-full first:ms-0 last:rounded-e-full text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-50 dark:border-gray-700 dark:text-blue-900 dark:hover:bg-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:bg-gray-400 dark:focus:text-white'>
            >
          </button>
        </div>
    </div>";
  }

  /**
   * Method contentScrollX
   *
   * @param mixed $data [donnée à transmètre à la method]
   * @param string $title [title de la section article]
   * @param array $parameters [paramètre de la route actuel du client -> synergie]
   * @param string $id [id de l'article qui sera contrôller par JS]
   * @param string $method [définit la méthod à exécuter séléctionner par switch]
   * @param array $optionLinkPage [si on dois ajouter un lien pour voir la suite des élément en fin de bloc  voir plus d'éléments]
   * @param array $optionSwitchMenu [option si on ajoute le menue de séléction des élément celon plusieurs critère défini par le menu lui même]
   *
   * @return void
   */
  public static function contentScrollX(
    mixed $data,
    string $title,
    array $parameters,
    string $id,
    string $method,
    array $optionLinkPage = [],
    array $optionSwitchMenu = ['view' => false, 'method' => '', 'arguments' => ['idElemet', 'selectedMenu']],
    string $addClassWidth = 'w-4/5'
  ) {
    $html  = "<section class=' grid grid-cols-2 gap-5 justify-between items-center {$addClassWidth} mx-auto bg-paintbrush bg-contain bg-opacity-90 bg-repeat-x'>";

    /*
    * Bloc condition pour l'affichage du menu de séléction d'affichage des bloc d'élement défilent de gauche à droite
    * Si !$optionSwitchMenu['view'] est remplit alors on affiche simplement les boutton de défilement
    * Sinon on appel la méthod callback et on ajoute les bouttons de séléction des élément à afficher - Menu contrôller avec JS
    * */
    if (!$optionSwitchMenu['view']) :
      $html .= "<h2 class='text-base md:text-2xl lg:text-4xl col-span-1 me-5'>{$title}</h2>";
      $html .= self::buttonScrollX($id);
    else :
      $html .= "<h2 class='text-base md:text-2xl lg:text-4xl col-span-full me-5'>{$title}</h2>";
      $html .=
        is_callable(array(self::class, $optionSwitchMenu['method']))
        ? call_user_func_array(array(self::class, $optionSwitchMenu['method']), $optionSwitchMenu['arguments'])
        : '';

      $html .= self::buttonScrollX($id);
    endif;

    // Contenue du bloc d'élément de gauche à droite à défilement contrôller avec JS -> <article id='{$id}'...
    $html .= "<article id='{$id}' class='flex flex-row gap-x-5 justify-start items-center overflow-x-auto my-2 py-2 col-span-full '>";

    // Contrôlle du contenue à afficher celon la $method séléctionner
    switch ($method):
      case 'elementSeason':
        $html .=  self::elementSeason($data, $parameters['synergies']); // Affichage des season de gauche à droite celon la séléction de la synergies
        break;
      case 'elementScrollX':
        $html .=  self::elementScrollX($data, $parameters['synergies']); // Affichage des élément de gauche à droite celon la séléction de la synergies
        break;
      case 'createEmbed':
        $html .=  EmbedVideo::createEmbed($data); // Affichage des vidéos bande annonces de gauche à droite celon la séléction de la synergies
        break;
      case 'elementCreditScrollX':
        $html .=  self::elementCreditScrollX($data); // Affichage des Crédits de la séries ou films de gauche à droite celon la séléction de la synergies
        break;
    endswitch;
    // si empty($optionLinkPage) on affiche rien , sinon on ajoute un  boutton avec le lien transmis en argument pour afficher la suites des éléments
    $html .= empty($optionLinkPage) ? "" :
      "<a href='{$optionLinkPage['url']}' title='{$optionLinkPage['title']}'>
      {$optionLinkPage['name']} 
      <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M0 3.795l2.995-2.98 11.132 11.185-11.132 11.186-2.995-2.981 8.167-8.205-8.167-8.205zm18.04 8.205l-8.167 8.205 2.995 2.98 11.132-11.185-11.132-11.186-2.995 2.98 8.167 8.206z'/></svg></a>";

    $html .= "</article>";

    $html .= "</section>";

    return $html;
  }

  public static function elementScrollX(array $item, string $synergies)
  {

    return join('', array_map(function ($item) use ($synergies) {

      $title = isset($item->original_title) ? $item->original_title : $item->name;
      $date = isset($item->release_date) ? $item->release_date : "N/A";

      return
        "<div class='flex items-center justify-center mx-auto w-[155px]'>
        <div class='flex flex-col mx-auto'>
          <div class='rounded-3xl w-[150px] shadow-sm flex-col'>
              <a
                href='" . ConstantApp::HOST_NAME . "/details/{$synergies}/" . str_replace(' ', '-', $title) . "/{$item->id}'
              >
                <img
                  src='./assets/images/placeholder.png'
                  data-src='" . ConstantApp::SRC_IMAGE_ORIGIN . $item->poster_path . "'
                  loading='lazy'
                  class='rounded-3xl justify-center h-[225px] w-[150px] grid object-cover'
                  alt='{$title}'
                  /> 
                </a>

              <div class='group p-6 grid z-10 text-left'>
                <a
                  href='" . ConstantApp::HOST_NAME . "/details/{$synergies}/" . str_replace(' ', '-', $title) . "/{$item->id}'
                  class='group-hover:text-cyan-700 font-semibold text-xs sm:text-[1em] line-clamp-3 truncate hover:text-clip'
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
    }, $item));
  }

  public static function elementProduction($items)
  {
    return join('', array_map(function ($item) {

      return
        "<div class='flex items-center justify-start gap-2'>
          <div class='shadow-sm'>
            <img
            src='./assets/images/placeholder.png'
            data-src='" . ConstantApp::SRC_IMAGE_W500 . $item->logo_path . "'
            loading='lazy'
            class='justify-center h-auto w-[105px] grid object-content'
            alt='{$item->name}'
            /> 
          </div>
          <div class='flex flex-row gap-2'>
          " . self::formatRoundedSpan([$item->name, $item->origin_country]) . "
          </div>
        </div>";
    }, $items));
  }

  public static function elementSeason(array $items, $synergies)
  {
    return join('', array_map(function ($item) use ($synergies) {

      return
        "<div class='flex items-center justify-center mx-auto w-[155px]'>
      <div class='flex flex-col mx-auto'>
        <div class='rounded-3xl w-[150px] shadow-sm flex-col'>
            <a
              href='" . ConstantApp::HOST_NAME . "/details/{$synergies}/" . str_replace(' ', '-', $item->name) . "/{$item->id}'
              class='group-hover:text-cyan-700 font-semibold text-xs sm:text-[1em] line-clamp-3'
            >
            <img
              src='./assets/images/placeholder.png'
              data-src='" . ConstantApp::SRC_IMAGE_ORIGIN . $item->poster_path . "'
              loading='lazy'
              class='rounded-3xl justify-center h-[225px] w-[150px] grid object-cover'
              alt='{$item->name}'
            /> 
            </a>
            <div class='group p-6 grid z-10 text-left truncate hover:text-clip'>
                {$item->name}
              <span class='text-slate-400 pt-2 font-semibold text-center'>
                Saison ({$item->season_number})
              </span>
              <span class='text-slate-400 pt-2 font-semibold text-center'>
                ({$item->air_date})
              </span>
            </div>
        </div>
      </div> 
    </div>";
    }, $items));
  }

  public static function elementCreditScrollX(mixed $data)
  {
    $imageProfile = "<img src='" . ConstantApp::HOST_NAME . "/assets/images/placeholder.png' alt='{$data->name}' class='w-24 h-24 object-cover mb-2 rounded-full' />";

    return join('', array_map(function ($item) {
      if (isset($item->profile_path)) $imageProfile = "<img src='" . ConstantApp::SRC_IMAGE_ORIGIN . "/{$item->profile_path}' alt='{$item->name}' class='w-24 h-24 object-cover mb-2 rounded-full' />";
      //<div class='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4'>
      return
        "<figure class='bg-white rounded-lg shadow-md p-4 w-[225px] min-h-48'>
             {$imageProfile}
              <figcaption>
            <h3 class='text-lg font-semibold text-gray-800 h-20 text-center'>{$item->name}</h3>
            <a href='#' class='text-blue-500'>Plus d'informations</a>
          </figcaption>
        </figure>";
    }, $data));
  }
}
