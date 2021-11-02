<?php


if($page->slug() == "manchettes"){


	$txt_arr = explode("\n", $page->text() );

	shuffle($txt_arr);


	$annonce = array_pop($txt_arr);

	echo json_encode($annonce);
}

