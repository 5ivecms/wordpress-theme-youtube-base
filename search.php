<?php

/**
 * @var VideoModel[] $videos
 * @var $pageH1 string
 * @var $metaDescription string
 * @var $pageTitle string
 * @var $pageSeoText string
 * @var VideoCategory[] $categories
 * @var VideoModel[] $popular
 */

$thumbRelay = thumbRelay();
$relayDomain = getRelayDomain();

?>

<?php get_template_part('template-parts/header', null, [
    'metaTitle' => $pageTitle,
    'metaDescription' => $metaDescription,
]) ?>

<div class="layout">
    <?php get_template_part('template-parts/categories', null, ['categories' => $categories]) ?>
    <div class="search-page container-fluid">
        <div class="row">
            <div class="col search-page_left">
                <?php if (strlen($pageH1) > 0) : ?>
                    <h1 class="page-header">
                        <i class="fa fa-search"></i>
                        <?= $pageH1 ?>
                    </h1>
                <?php endif; ?>

                <?php if (count($videos) > 0) : ?>
                    <?php foreach ($videos as $video) : ?>
                        <?php get_template_part('template-parts/video', 'card-lg', ['video' => $video, 'thumb_relay' => $thumbRelay, 'relay_domain' => $relayDomain]); ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>Видео нет</p>
                <?php endif; ?>

                <?php get_template_part('template-parts/seo-text', '', ['text' => $pageSeoText]); ?>

            </div>
            <div class="col search-page_right">
                <div class="video-widget">
                    <h5 class="video-widget_title">
                        <i class="fa fa-fire fa-lg"></i>
                        Популярные
                    </h5>
                    <?php foreach ($popular as $video) : ?>
                        <?php get_template_part('template-parts/video', 'card-sm', ['video' => $video, 'thumb_relay' => $thumbRelay, 'relay_domain' => $relayDomain]); ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <?php get_footer(); ?>
</div>
<?php get_template_part('template-parts/drawer', null, ['categories' => $categories]) ?>