<?php snippet('header') ?>

<!-- <h1><?= $page->title() ?></h1>

<?= $page->slug() ?>
 -->
<section data-left="<?= $page->speech_left()->text() ?>" data-right="<?= $page->speech_right()->text() ?>">
	<?= $page->text()->kt() ?>
</section>

<?php snippet('footer') ?>