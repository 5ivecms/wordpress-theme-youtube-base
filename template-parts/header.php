<?php

/**
 * @var VideoData $video
 * @var $metaDescription string
 * @var $metaTitle string
 * @var $videoObjectDescription string
 * @var $ogImgAlt string
 */

$video = $args['video'] ?? null;
$metaDescription = $args['metaDescription'] ?? '';
$metaTitle = $args['metaTitle'] ?? '';
$videoObjectDescription = $args['videoObjectDescription'] ?? '';
$ogImgAlt = $args['ogImgAlt'] ?? '';

?>

<!doctype html>
<?php if ($video !== null) : ?>
    <html prefix="og: http://ogp.me/ns# video: http://ogp.me/ns/video#" lang="ru">
<?php else : ?>
    <html lang="ru">
<?php endif; ?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
    <link rel="manifest" href="/favicons/site.webmanifest">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="shortcut icon" href="/favicons/favicon.ico" />

    <?php wp_head(); ?>
    <?php if ($video) : ?>
        <?php get_template_part('template-parts/video-schema', null, [
            'video' => $video,
            'metaDescription' => $metaDescription,
            'videoObjectDescription' => $videoObjectDescription,
            'ogImgAlt' => $ogImgAlt
        ]) ?>
    <?php else : ?>
        <?php get_template_part('template-parts/base-schema', null, [
            'metaTitle' => $metaTitle,
            'metaDescription' => $metaDescription,
        ]) ?>
    <?php endif; ?>
</head>

<body>
    <nav id="header" class="navbar bg-light fixed-top bg-white">
        <div class="navbar-content">
            <div class="navbar-content_left">
                <a class="navbar-brand" href="/">
                    <i class="far fa-play-circle"></i>
                    <span>SuperVideoTube</span>
                </a>
            </div>
            <div class="navbar-content_right">
                <div class="container-fluid d-flex align-items-center">
                    <?php get_search_form(); ?>
                    <button id="close-mobile-search" type="button" class="btn-close close-mobile-search" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
                    <button id="mobile-search-btn" class="btn btn-outline-danger mobile-search-btn">
                        <i class="fa fa-search"></i>
                    </button>
                    <button class="navbar-toggler menu-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobile-menu">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </nav>