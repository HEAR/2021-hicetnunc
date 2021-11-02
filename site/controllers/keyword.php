<?php

return function ($site, $page) {

  $query   = $page->keyword();
  // $results = $site->index()->listed()->filterBy('slug', 'not in', ['mots-cles','manchettes'])->search($query, 'title|text');
  // $results = page('entretiens')->children()->listed()->search($query, 'title|text');
  $results = page('entretiens')->children()->listed()->bettersearch($query, 'title|text');

// https://github.com/bvdputte/kirby-bettersearch
// composer require bvdputte/kirby-bettersearch

  return [
    'query'   => $query,
    'results' => $results,
  ];

};