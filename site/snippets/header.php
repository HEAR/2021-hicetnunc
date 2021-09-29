<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex">
	<title><?= $site->title() ?></title>

	<?= css('assets/css/style.css?v=0.12') ?>

</head>
<body>

<main>

<h1>
	<a href="<?= $site->url() ?>"><?= $site->title() ?></a>
</h1>


<?php snippet("menu") ?>