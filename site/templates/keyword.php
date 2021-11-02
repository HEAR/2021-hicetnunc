<?php snippet('header') ?>

<!-- https://getkirby.com/docs/cookbook/content/search -->



<?php

$pageText = array(); 
$searchTerm = (string)$page->keyword();

// print_r($results));
foreach ($results as $result): 
	$text = $result->text();
	$textArr = explode("\n", $text);
	
	$pageText[] = "## <a href='".$result->url()."'>".$result->title()."</a>";
	
	foreach($textArr as $paragraph) :
		$pos = strpos( Str::lower($paragraph), Str::lower($searchTerm) );
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
	<h2><?= $page->title() ?></h2>
	<?= kirbytext( implode("\n", $pageText) ); ?>
</section>

<?php snippet('footer') ?>