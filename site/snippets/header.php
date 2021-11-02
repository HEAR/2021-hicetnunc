<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex">
	<meta name="viewport" content="width=device-width, maximum-scale=1.0">
	<title><?= $site->title() ?></title>
	<link rel="shortcut icon" type="image/png" href="<?= $site->url()."/assets/favicon.png"?>"/>

	<meta name="marqeeURL" id="marqeeURL" href="<?= $site->url() ?>/manchettes.json">

	<?= css([
		'assets/css/style.css?v=0.35'
	]) ?>
	<?= js([
		'assets/js/qrcode.min.js',
		'assets/js/jquery-3.6.0.min.js',
		'assets/js/jquery.marquee.min.js',
		'assets/js/script.js?v=0.23',
	]) ?>

</head>
<body>

<main>

<!-- <h1>
	<a href="<?= $site->url() ?>"><?= $site->title() ?></a>
</h1> -->

<?php snippet("menu-main") ?>


<!-- fin snippets/header.php -->