<?php /* Template Name: Тренды */ ?>
<?php
/**
 * @var VideoModel[] $videos
 * @var $pageH1 string
 * @var $metaDescription string
 * @var $pageTitle string
 * @var $pageSeoText string
 * @var VideoCategory[] $categories
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
    <div class="container-fluid content">
        <?php if (strlen($pageH1) > 0) : ?>
            <h1 class="page-header">
                <i class="fa fa-fire fa-lg"></i>
                <?= $pageH1 ?>
            </h1>
        <?php endif; ?>

        <?php if (count($videos) > 0) : ?>
            <div class="video-block">
                <div class="video-items">
                    <?php foreach ($videos as $video) : ?>
                        <div class="video-items_item">
                            <?php get_template_part('template-parts/video', 'card', ['video' => $video, 'thumb_relay' => $thumbRelay, 'relay_domain' => $relayDomain]); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else : ?>
            <p>Видео нет</p>
        <?php endif; ?>

        <?php get_template_part('template-parts/seo-text', '', ['text' => $pageSeoText]); ?>
        <?php get_footer(); ?>
    </div>
</div>

<?php get_template_part('template-parts/drawer', null, ['categories' => $categories]) ?>