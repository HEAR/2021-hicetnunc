<?php


$json = new stdClass();

$json->titre = $page->title();
$json->content = $page->text()->kt();

echo json_encode($json);