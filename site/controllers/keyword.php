<?php

return function ($site, $page) {

  $query   = $page->keyword();
  $results = $site->search($query, 'title|text')->filterBy('slug', 'not', 'mots-cles');

  return [
    'query'   => $query,
    'results' => $results,
  ];

};