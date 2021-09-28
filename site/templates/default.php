<?php snippet('header') ?>

<h1><?= $page->title() ?></h1>

<?= $page->slug() ?>

<main>
	
	<?= $page->text()->kt() ?>

</main>



<?php foreach( $page->files() as $file ) : ?>

	<!-- <img src="<?= $file->url() ?>" alt=""> -->

<?php endforeach ; ?>


<?php snippet('footer') ?>