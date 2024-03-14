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
    <nav class="flex items-center justify-between flex-wrap bg-blue-800 p-6">
      <div class="flex items-center flex-shrink-0 text-white mr-6">
        <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg">
          <path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z" />
        </svg>
        <span>
          <p class="sr-only">Lien vers l'acceuil CineTech</p>
          <a href="/" title="Acceuil Cinetech"><span class="font-semibold text-xl tracking-tight">CineTech +</span></a>
        </span>
      </div>
      <div class="block lg:hidden">
        <button class="flex items-center px-3 py-2 border rounded text-blue-200 hover:text-white hover:border-white">
          <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
          </svg>
        </button>
      </div>
      <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="text-sm lg:flex-grow">
          <a href="/film" class="text-base md:text-lg xl:texte-xl block mt-4 lg:inline-block lg:mt-0 text-blue-200 hover:text-white mr-4">
            films
          </a>
          <a href="/serie" class="text-base md:text-lg xl:texte-xl block mt-4 lg:inline-block lg:mt-0 text-blue-200 hover:text-white">
            séries
          </a>
          <a href="/contact" class="text-base md:text-lg xl:texte-xl block mt-4 lg:inline-block lg:mt-0 text-blue-200 hover:text-white">
            contact
          </a>
        </div>
        <div>
          <select name="selectLang" id="selectLang" class="block w-[185px] p-2 mb-6 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <?= $optionLang; ?>
          </select>
        </div>
      </div>
    </nav>
  </header>

  <main id="content-main" class="flex flex-col mx-2 space-y-4 md:max-w-4xl lg:max-w-6xl md:mx-auto">