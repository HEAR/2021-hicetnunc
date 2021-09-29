<?php

return function ($site, $page) {

  $query   = $page->keyword();
  $results = $site->search($query, 'text');

  return [
    'query'   => $query,
    'results' => $results,
  ];

};