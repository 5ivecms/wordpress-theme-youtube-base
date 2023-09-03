<?php
/**
 * @var array $queries
 * @var string $title
 */

if (isset($args)) {
    $queries = $args['queries'];
    $title = $args['title'];
}

?>

<?php if (count($queries) > 0): ?>

    <div class="queries-widget my-4">
        <?php if ($title && strlen($title) > 0): ?>
            <div class="queries-widget_head">
                <h5 class="queries-widget_title"><?= $title ?></h5>
                <a class="btn btn-outline-danger btn-sm" href="<?= getLastQueriesUrl() ?>">Все запросы</a>
            </div>
        <?php endif; ?>

        <ul class="queries-widget_list">
            <?php foreach ($queries as $query): ?>
                <li class="queries-widget_list-item">
                    <a href="<?= getSearchUrl() ?>/<?= $query['keyword'] ?>"><?= $query['keyword'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php endif; ?>