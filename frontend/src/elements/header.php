<?php

use App\Cinetech\Components\FileImport;

$langUser = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

$fileLang =  FileImport::getFile('config/languages/tmdb.lang.json', true);
$optionLang =
  join(
    '',
    array_map(
      function ($array) use ($langUser) {
        $selected = strtoupper($langUser) === $array['iso_3166_1'] ? 'selected' : '';
        return "<option {$selected} class='text-sm' value='{$array['iso_3166_1']}'>{$array['english_name']}</option>";
      },
      $fileLang
    )
  );

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CineTech - Projet de formation - La PlateForme</title>
  <link href="/assets/styles/global.css" rel="stylesheet">
</head>

<body class="flex flex-col space-y-5">

  <header>
    <nav class="bg-white border-gray-200 dark:bg-gray-900 w-full">
      <div class="flex flex-wrap items-center justify-between max-w-screen-2xl mx-auto p-4">
        <span>
          <p class="sr-only">Lien vers l'acceuil CineTech</p>
          <a href="/" title="Acceuil Cinetech"><span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">CineTech +</span></a>
        </span>
        <div class="flex items-center md:order-2 space-x-1 md:space-x-2 rtl:space-x-reverse">

          <button data-collapse-toggle="mega-menu" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mega-menu" aria-expanded="false">
            <span class="sr-only">Ouvrir le menu principal</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
          </button>
        </div>
        <div id="mega-menu" class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1">
          <ul class="flex flex-col justify-center space-y-2 mt-4 font-medium lg:flex-row lg:mt-0 lg:space-x-8 lg:justify-center lg:items-center rtl:space-x-reverse">
            <li class="mt-2">
              <button id="films-menu-dropdown-button" data-dropdown-toggle="films-menu-dropdown" class="flex items-center justify-between w-full py-2 px-3 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                Films <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                </svg>
              </button>
              <div id="films-menu-dropdown" class="absolute z-10 grid hidden w-auto grid-cols-2 text-sm bg-white border border-gray-100 rounded-lg shadow-md dark:border-gray-700 md:grid-cols-3 dark:bg-gray-700">
                <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                  <ul class="space-y-4" aria-labelledby="films-menu-dropdown-button">
                    <li>
                      <a href="/films" class="p-2 text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                        populaires
                      </a>
                    </li>
                    <li>
                      <a href="/films/now" class="p-2 text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                        du moment
                      </a>
                    </li>
                    <li>
                      <a href="/films/upcoming" class="p-2 text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                        à venir
                      </a>
                    </li>
                    <li>
                      <a href="/films/top-rated" class="p-2 text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                        les mieux noté
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li>
              <button id="series-menu-dropdown-button" data-dropdown-toggle="series-menu-dropdown" class="flex items-center justify-between w-full py-2 px-3 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                Séries <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                </svg>
              </button>
              <div id="series-menu-dropdown" class="absolute z-10 grid hidden w-auto grid-cols-2 text-sm bg-white border border-gray-100 rounded-lg shadow-md dark:border-gray-700 md:grid-cols-3 dark:bg-gray-700">
                <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                  <ul class="space-y-4" aria-labelledby="series-menu-dropdown-button">
                    <li>
                      <a href="/series" class="p-2 text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                        populaires
                      </a>
                    </li>
                    <li>
                      <a href="/series/airing-today" class="p-2 text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                        diffusées aujourd'hui
                      </a>
                    </li>
                    <li>
                      <a href="/series/on-the-air" class="p-2 text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                        en cours de diffusion
                      </a>
                    </li>
                    <li>
                      <a href="/series/top-rated" class="p-2 text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                        les mieux noté
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li>
              <select name="selectLang" id="selectLang" onmousedown="this.size=5;" onchange="this.removeAttribute('size');" class="inline-block w-[135px] sm:w-[185px] max-h-20 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <?= $optionLang; ?>
              </select>
            </li>
            <li class="flex flex-col sm:flex-row gap-2 items-start">
              <a href="/connection" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm py-2 px-5 md:py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Connexion</a>
              <a href="/inscription" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm py-2 px-5 md:py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Inscription</a>
            </li>
          </ul>
        </div>
      </div>

    </nav>
  </header>

  <main id="content-main" class="flex flex-col mx-2 space-y-4 md:max-w-4xl lg:max-w-6xl md:mx-auto md:gap-y-8 lg:gap-y-10">