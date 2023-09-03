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
<?php if ($video !== null): ?>
<html prefix="og: http://ogp.me/ns# video: http://ogp.me/ns/video#" lang="ru">
<?php else: ?>
<html lang="ru">
<?php endif; ?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
    <?php if ($video): ?>
        <?php get_template_part('template-parts/video-schema', null, [
            'video' => $video,
            'metaDescription' => $metaDescription,
            'videoObjectDescription' => $videoObjectDescription,
            'ogImgAlt' => $ogImgAlt
        ]) ?>
    <?php else: ?>
        <?php get_template_part('template-parts/base-schema', null, [
            'metaTitle' => $metaTitle,
            'metaDescription' => $metaDescription,
        ]) ?>
    <?php endif; ?>
</head>

<body>

    <nav class="navbar bg-light fixed-top bg-white">
        <div class="navbar-content">
            <div class="navbar-content_left">
                <a class="navbar-brand" href="/">
                    <i class="far fa-play-circle"></i>
                    <span>SuperVideoTube</span>
                </a>
            </div>
            <div class="navbar-content_right">
                <div class="container-fluid">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </nav>
