<?php snippet('header') ?>

<!-- templates/default.php -->

<section class="<?php if ($page->is_menu()->toBool() === true){ echo "listing"; }?>" data-left="<?= $page->speech_left()->text() ?>" data-right="<?= $page->speech_right()->text() ?>">

	<?php snippet("menu-sub") ?>

	<?php if( $page->is_menu()->toBool() === true ){ echo '<nav>'; } ?>
	<?= $page->text()->kt() ?>
	<?php if( $page->is_menu()->toBool() === true ){ echo '</nav>'; }?>


	<?php
	$documents =  $page->files();

	foreach($documents as $document): ?>
		<?php 

		// $csv = array_map('str_getcsv', str_getcsv( $document->read() ));
		// array_walk($csv, function(&$a) use ($csv) {
		//   $a = array_combine($csv[0], $a);
		// });
		// array_shift($csv); # remove column header

		// print_r($csv);
		// 
		// $array = array_map('str_getcsv', $document->read() );

		// $header = array_shift($array);

		// array_walk($array, '_combine_array', $header);

		// function _combine_array(&$row, $key, $header) {
		//   $row = array_combine($header, $row);
		// }

		// print_r($array);

		print_r( json_decode( $document->read() ) ) 


		?> 
	<?php endforeach ?>

</section>

<!-- fin templates/default.php -->

<?php snippet('footer') ?>