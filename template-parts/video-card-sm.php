<?php

/**
 * @var VideoModel $video
 * @var $thumbRelay boolean
 * @var $relayDomain string
 */

$video = $args['video'] ?? null;
$thumbRelay = $args['thumb_relay'] ?? false;
$relayDomain = $args['relay_domain'] ?? '';

$videoUrl = getVideoUrl($video->id, $video->title);

$imgSrc = 'https://img.youtube.com/vi/' . $video->id . '/mqdefault.jpg';
if ($thumbRelay && strlen($relayDomain) > 0) {
    $imgSrc = $relayDomain . '/img/' . strrev($video->id) . '/' . getSlug($video->title) . '.jpg';
}

?>

<div class="video-card _sm">
    <div class="row">
        <div class="col-5 pe-0">
            <a href="<?= $videoUrl ?>" class="item-link">
                <span class="video-card_image">
                    <img src="<?= $imgSrc ?>" alt="<?= $video->title ?>" class="w-100 shadow-sm" />
                    <?php if (strlen($video->duration)) : ?>
                        <span class="video-card_duration">
                            <?= $video->readabilityDuration ?>
                        </span>
                    <?php endif; ?>
                    <span class="video-card_overlay"></span>
                </span>
            </a>
        </div>
        <div class="col-7">
            <h4 class="video-card_title"><a href="<?= $videoUrl ?>"><?= $video->title ?></a></h4>
            <span class="video-card_time-ago"><?= $video->timeAgo ?></span>
        </div>
    </div>
</div>