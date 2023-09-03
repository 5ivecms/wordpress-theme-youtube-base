<?php
/**
 * @var VideoData $video
 * @var $pageH1 string
 * @var $metaDescription string
 * @var $videoObjectDescription string
 * @var $ogImgAlt string
 * @var $pageSeoText string
 * @var VideoModel[] $popular
 * @var $embedRelay boolean
 * @var VideoCategory[] $categories
 * @var $isVideoPage boolean
 * @var $isEmbedPage boolean
 */

$thumbRelay = thumbRelay();
$embedRelay = embedRelay();
$relayDomain = getRelayDomain();

$videoSrc = 'https://www.youtube.com/embed/' . $video->video->id . '';
if ($embedRelay && strlen($relayDomain)) {
    $videoSrc = $relayDomain . '/embed/' . strrev($video->video->id) . '/';
}

?>

<?php get_template_part('template-parts/header', null, [
    'video' => $video->video,
    'metaDescription' => $metaDescription,
    'videoObjectDescription' => $videoObjectDescription,
    'ogImgAlt' => $ogImgAlt
]) ?>

<div class="layout">
    <?php get_template_part('template-parts/categories', null, ['categories' => $categories]) ?>
    <div class="full-video container-fluid">
        <div class="row">
            <div class="col full-video_left">
                <div class="player">
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="<?= $videoSrc ?>" frameborder="0" allowfullscreen allowusermedia webkitallowfullscreen mozallowfullscreen></iframe>
                    </div>
                    <h1 class="full-video_title"><?= $pageH1 ?></h1>
                    <div class="f-desc full-text clearfix">
                        <p>
                            <a href="<?= getChannelUrl($video->video->channelId) ?>"><?= $video->video->channelTitle ?></a>
                        </p>
                        <p><?= $video->video->viewsStr ?> просмотров</p>
                        <p><?= $video->video->description ?></p>
                        <p><?= $pageSeoText ?></p>
                    </div>
                    <?php get_template_part('template-parts/comments', null, ['comments' => $video->comments]); ?>
                </div>
            </div>

            <div class="col full-video_right">
                <?php if (count($video->related) > 0): ?>
                    <h5>Смотрите далее:</h5>
                    <?php foreach ($video->related as $video): ?>
                        <?php get_template_part('template-parts/video', 'card', ['video' => $video, 'thumb_relay' => $thumbRelay, 'relay_domain' => $relayDomain]); ?>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if (count($popular) > 0): ?>
                    <h5>Популярные:</h5>
                    <?php foreach ($popular as $video): ?>
                        <?php get_template_part('template-parts/video', 'card', ['video' => $video, 'thumb_relay' => $thumbRelay, 'relay_domain' => $relayDomain]); ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
