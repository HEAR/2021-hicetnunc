<?php snippet('header') ?>

<!-- https://getkirby.com/docs/cookbook/content/search -->

<h1><?= $page->title() ?></h1>

<?php

$pageText = array(); 
$searchTerm = (string)$page->keyword();

foreach ($results as $result): 
	$text = $result->text();
	$textArr = explode("\n", $text);
	
	$pageText[] = "## <a href='".$result->url()."'>".$result->title()."</a>";
	
	foreach($textArr as $paragraph) :
		$pos = strpos($paragraph, $searchTerm );
		if( $pos === false ){
			// nothing
		}else{	
			$pageText[] = "[…]";
			$pageText[] = $paragraph;
		}
	endforeach;
endforeach;

?>

<section data-left="" data-right="">
	<?= kirbytext( implode("\n", $pageText) ); ?>
</section>

<?php snippet('footer') ?>