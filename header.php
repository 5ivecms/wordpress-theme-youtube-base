<!doctype html>
<html prefix="og: http://ogp.me/ns# video: http://ogp.me/ns/video#" lang="ru">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>

<body>

<div id="page" class="wrap">
    <header class="header">
        <div class="header-in wrap-center fx-row fx-middle">
            <a href="/" class="logo fw700 nowrap">
                <i class="fa fa-play" aria-hidden="true"></i>
                YoutubeAPI
            </a>
            <?php get_search_form(); ?>
            <ul class="h-menu">
                <li><a href="<?= getTrendsUrl() ?>">Тренды</a></li>
                <li><a href="<?= getLastQueriesUrl() ?>">Сейчас ищут</a></li>
            </ul>
            <div class="btn-menu"><span class="fa fa-reorder"></span></div>
        </div>
    </header>
