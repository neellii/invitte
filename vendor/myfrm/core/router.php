<?php

  require CONFIG . '/routes.php';

  $uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], "/"); // global array server where all info about postupivshem zaprose located, method request_URI returns uri without domen name -  /about, /post/2; trim will remove ukazannuyu char - "/"; so result - about, post/2

  if(array_key_exists($uri, $routes)) { // if in routes array we have key that equal to uri then...

    if(file_exists(CONTROLLERS . "/{$routes[$uri]}")) {
      require CONTROLLERS . "/{$routes[$uri]}";
    } else {
      abort();
    }

  } else {
    abort();
  }

  // if ($uri === "php-practicr/index.php") {
  //   require CONTROLLERS . '/index.php';
  // } elseif ($uri == 'php-practicr/about') {
  //   require CONTROLLERS . '/about.php';
  // } elseif ($uri == 'php-practicr/post') {
  //   dd("SHOW POST");
  // } else {
  //   abort();
  // }