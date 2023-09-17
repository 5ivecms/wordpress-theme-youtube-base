<?php

/**
 * @var VideoCategory[] $categories
 */

if (isset($args)) {
  $categories = $args['categories'] ?? [];
}

$navigation = [
  'home' => [
    'url' => '/',
    'title' => 'Домой'
  ],
  'trends' => [
    'url' => getTrendsUrl(),
    'title' => 'Тренды'
  ],
]
?>

<div class="offcanvas offcanvas-start" tabindex="-1" id="mobile-menu">
  <div class="offcanvas-header">
    <a class="navbar-brand" href="/">
      <i class="far fa-play-circle"></i>
      <span>SuperVideoTube</span>
    </a>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
  </div>
  <div class="offcanvas-body">
    <div class="list-group w-100 categories">
      <?php foreach ($navigation as $k => $item) : ?>
        <a class="list-group-item list-group-item-action border-0" href="<?= $navigation[$k]['url'] ?>">
          <i class="<?= getCategoryIcon($k) ?>"></i><?= $navigation[$k]['title'] ?>
        </a>
      <?php endforeach; ?>
      <?php foreach ($categories as $category) : ?>
        <a class="list-group-item list-group-item-action border-0" href="<?= getCategoryUrl($category->slug) ?>"><i class="<?= getCategoryIcon($category->youtube_id) ?>"></i><?= $category->title ?></a>
      <?php endforeach; ?>
    </div>
  </div>
</div>