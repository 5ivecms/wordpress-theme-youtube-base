<?php
/**
 * @var VideoCategory[] $categories
 */
?>


<?php get_template_part('template-parts/header', null, [
    'metaTitle' => 'Страница не найдена',
    'metaDescription' => 'Страница не найдена',
]) ?>

    <div class="layout">
        <?php get_template_part('template-parts/categories', null, ['categories' => $categories]) ?>
        <div class="container-fluid content">
            <div>
                <h1 style="font-size: 5rem">404!</h1>
                <?php get_search_form(); ?>
            </div>

            <?php
            get_footer(); ?>
        </div>
    </div>



