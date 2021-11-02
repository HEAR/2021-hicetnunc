<?php snippet('header') ?>

<!-- templates/keyword.php -->

<!-- https://getkirby.com/docs/cookbook/content/search -->


<?php

$pageText = array(); 
$searchTerm = (string)$page->keyword();


// print_r($results));
foreach ($results as $result): 
	$text = $result->text();
	$textArr = explode("\n", $text);
	$isFirst = true;
	
	$pageText[] = "## <a href='".$result->url()."'>".$result->title()."</a>";
		
	foreach($textArr as $paragraph) :
		$pos = strpos( Str::lower($paragraph), Str::lower($searchTerm) );
		if( $pos === false ){
			// nothing
		}else{	
			if(!$isFirst) { $pageText[] = "[…]"; }
			$pageText[] = $paragraph;

			$isFirst = false;
		}
	endforeach;
endforeach;

?>

<section data-left="" data-right="">
	<h2><?= $page->title() ?></h2>
	<?= kirbytext( implode("\n", $pageText) ); ?>
</section>


<!-- fin templates/keyword.php -->

<?php snippet('footer') ?>