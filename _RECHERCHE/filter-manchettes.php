<?php

require_once("parsecsv-for-php/parsecsv.lib.php");

$csv = new \ParseCsv\Csv();

$csv->delimiter = ";";
$csv->parseFile('manchette_corrige.csv');
print_r($csv->data);



$txt = "";

foreach( $csv->data as $line){

	$temp = !empty($line['Ligne spéciale']) ? mb_strtoupper($line['Ligne spéciale'])." " : ""; 

	$txt .= trim($line['Date'].' '.$temp .$line['Ligne 1'].' '.$line['Ligne 2'].' '.$line['Ligne 3'].' '.$line['Ligne 4'])."\n";
}

// str_replace("'","’",$txt);

file_put_contents("def_manchettes.txt", $txt );