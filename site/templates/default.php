<?php snippet('header') ?>

<!-- templates/default.php -->

<section class="<?php if ($page->is_menu()->toBool() === true){ echo "listing"; }?>" data-left="<?= $page->speech_left()->text() ?>" data-right="<?= $page->speech_right()->text() ?>">

	<?php snippet("menu-sub") ?>

	<?php if( $page->is_menu()->toBool() === true ){ echo '<nav>'; } ?>
	<?= $page->text()->footnotes() ?>
	<?php if( $page->is_menu()->toBool() === true ){ echo '</nav>'; }?>

</section>

<!-- fin templates/default.php -->

<?php snippet('footer') ?>