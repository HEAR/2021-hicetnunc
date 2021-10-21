<?php snippet('header') ?>

<!-- templates/default.php -->

<section class="<?php if ($page->is_menu()->toBool() === true){ echo "listing"; }?>" data-left="<?= $page->speech_left()->text() ?>" data-right="<?= $page->speech_right()->text() ?>">
	<?= $page->text()->kt() ?>
</section>

<!-- fin templates/default.php -->

<?php snippet('footer') ?>