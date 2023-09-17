<?php /* Template Name: Последние запросы */ ?>
<?php
/**
 * @var $pageH1 string
 * @var $pageSeoText string
 * @var $queries array
 * @var $metaDescription string
 * @var $pageTitle string
 * @var VideoCategory[] $categories
 */
?>

<?php get_template_part('template-parts/header', null, [
    'metaTitle' => $pageTitle,
    'metaDescription' => $metaDescription,
]) ?>

<div class="layout">
    <?php get_template_part('template-parts/categories', null, ['categories' => $categories]) ?>
    <div class="container-fluid content">
        <div>
            <h1 class="page-header">
                <i class="fa fa-search"></i>
                <?= $pageH1 ?>
            </h1>
            <?php get_template_part('template-parts/queries', '', ['queries' => $queries]); ?>
            <?php get_template_part('template-parts/seo-text', '', ['text' => $pageSeoText]); ?>
        </div>
        <?php get_footer(); ?>
    </div>
</div>
<?php get_template_part('template-parts/drawer', null, ['categories' => $categories]) ?>