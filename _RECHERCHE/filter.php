<?php


$dates = explode("\n", file_get_contents("dates.txt") );
$dates = array_unique($dates);
$dates_export = array();

$currentMonth = 0;

$mois = array(
	"Janvier",
	"Février",
	"Mars",
	"Avril",
	"Mai",
	"Juin",
	"Juillet",
	"Août",
	"Septembre",
	"Octobre",
	"Novembre",
	"Décembre",
);

foreach($dates as $date ){
	// - (link: /keyword/papier text: papier)

	$temp = explode("/",$date);

	if($currentMonth != (int)$temp[1]){
		$dates_export[] = "## ".$mois[ (int)$temp[1] - 1 ]." ".$temp[2] ;
	}

	// $dates_export[] = "- (link: impression?date=" . $temp[0]."-".$temp[1]."-".$temp[2] . " text: " . $temp[0] . ")";

	$dates_export[] = "- <a href=\"#\" class=\"showQR\" data-date=\"" . $temp[0]."-".$temp[1]."-".$temp[2] . "\">" . $temp[0] . "</a>";

	$currentMonth = (int)$temp[1];
}


file_put_contents("def_dates.txt", implode("\n", $dates_export ) );