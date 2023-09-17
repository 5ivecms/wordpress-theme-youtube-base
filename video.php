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
 * @var $showVideoDescription
 * @var $showVideoSeoText
 */

$thumbRelay = thumbRelay();
$embedRelay = embedRelay();
$relayDomain = getRelayDomain();

$videoSrc = 'https://www.youtube.com/embed/' . $video->video->id . '';
if ($embedRelay && strlen($relayDomain)) {
    $videoSrc =  '/embed/' . strrev($video->video->id) . '/';
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
                        <iframe class="embed-responsive-item" src="<?= $videoSrc ?>" frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>
                    </div>
                    <h1 class="full-video_title"><?= $pageH1 ?></h1>
                    <div class="row align-items-center justify-content-end">
                        <div class="col-12 col-xl-6">
                            <div class="full-video_meta d-flex flex-row">
                                <span class="me-3"><?= $video->video->viewsStr ?> просмотров</span>
                                <span><?= $video->video->timeAgo ?></span>
                            </div>
                            <div class="full-video_channel">
                                <a href="<?= getChannelUrl($video->video->channelId) ?>" title="Канал: <?= $video->video->channelTitle ?>">
                                    <i class="fa fa-check-circle"></i><?= $video->video->channelTitle ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6 mb-3 mb-xl-0 mt-3 mt-xl-0 d-flex justify-content-center justify-content-xl-end">
                            <script src="https://yastatic.net/share2/share.js"></script>
                            <div class="ya-share2" data-curtain data-size="l" data-shape="round" data-limit="7" data-services="vkontakte,whatsapp,odnoklassniki,telegram,twitter,viber,moimir,skype,messenger"></div>
                        </div>
                    </div>
                    <?php if ($showVideoDescription || $showVideoSeoText) : ?>
                        <div class="full-video_description">
                            <?php if ($showVideoDescription) : ?>
                                <p><?= $video->video->description ?></p>
                            <?php endif; ?>
                            <?php if ($showVideoSeoText) : ?>
                                <p><?= $pageSeoText ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php get_template_part('template-parts/comments', null, ['comments' => $video->comments]); ?>
                </div>
            </div>

            <div class="col full-video_right">
                <?php if (count($video->related) > 0) : ?>
                    <div class="video-widget mb-5">
                        <h5 class="video-widget_title">
                            <i class="fas fa-forward"></i>
                            Смотрите далее
                        </h5>
                        <?php foreach ($video->related as $video) : ?>
                            <?php get_template_part('template-parts/video', 'card-sm', ['video' => $video, 'thumb_relay' => $thumbRelay, 'relay_domain' => $relayDomain]); ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (count($popular) > 0) : ?>
                    <div class="video-widget mb-5">
                        <h5 class="video-widget_title">
                            <i class="fa fa-fire fa-lg"></i>
                            Популярные
                        </h5>
                        <?php foreach ($popular as $video) : ?>
                            <?php get_template_part('template-parts/video', 'card-sm', ['video' => $video, 'thumb_relay' => $thumbRelay, 'relay_domain' => $relayDomain]); ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php get_footer(); ?>
    </div>
</div>

<?php get_template_part('template-parts/drawer', null, ['categories' => $categories]) ?>