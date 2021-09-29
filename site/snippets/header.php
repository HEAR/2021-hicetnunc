<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex">
	<title><?= $site->title() ?></title>

	<?= css('assets/css/style.css?v=0.17') ?>
	<?= js([
		'assets/js/jquery-3.6.0.min.js',
		'assets/js/script.js',
	]) ?>

</head>
<body>

<main>

<h1>
	<a href="<?= $site->url() ?>"><?= $site->title() ?></a>
</h1>


<?php snippet("treemenu") ?>