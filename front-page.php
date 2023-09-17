<?php

/**
 * @var VideoModel[] $videos
 * @var $pageH1 string
 * @var $metaDescription string
 * @var $pageTitle string
 * @var $pageSeoText string
 * @var $queries array
 * @var VideoCategory[] $categories
 * @var CategoriesWithVideos[] $categoriesWithVideos
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
            <h1 class="page-header"><?= $pageH1 ?></h1>
        <?php endif; ?>

        <?php if (!is_array($categoriesWithVideos)) : ?>
            <p>Нет видео</p>
        <?php else : ?>
            <?php foreach ($categoriesWithVideos as $categoriesWithVideo) : ?>
                <div class="video-block">
                    <div class="video-block_head">
                        <h3 class="video-block_title">
                            <i class="<?= getCategoryIcon($categoriesWithVideo->category->id) ?>"></i><?= $categoriesWithVideo->category->title ?>
                        </h3>
                    </div>
                    <div class="video-items">
                        <?php foreach ($categoriesWithVideo->videos as $video) : ?>
                            <div class="video-items_item">
                                <?php get_template_part('template-parts/video', 'card', ['video' => $video, 'thumb_relay' => $thumbRelay, 'relay_domain' => $relayDomain]); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php get_template_part('template-parts/seo-text', '', ['text' => $pageSeoText]); ?>
        <?php get_template_part('template-parts/queries', '', ['queries' => $queries, 'title' => 'Сейчас ищут']); ?>

        <?php get_footer(); ?>
    </div>
</div>
<?php get_template_part('template-parts/drawer', null, ['categories' => $categories]) ?>