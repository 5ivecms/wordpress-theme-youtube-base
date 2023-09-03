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

$imgSrc = 'https://i.ytimg.com/vi_webp/' . $video->id . '/mqdefault.webp';
if ($thumbRelay && strlen($relayDomain) > 0) {
    $imgSrc = $relayDomain . '/img/' . strrev($video->id) . '/' . getSlug($video->title) . '.webp';
}

?>

<div class="video-card">
    <a href="<?= $videoUrl ?>" class="item-link">
        <span class="video-card_image">
            <img src="<?= $imgSrc ?>" alt="<?= $video->title ?>" class="w-100 shadow-sm"/>
            <?php if (strlen($video->duration)): ?>
                <span class="video-card_duration">
                  <?= $video->readabilityDuration ?>
                </span>
            <?php endif; ?>
            <span class="video-card_channel">
                <i class="fa fa-check-circle"></i><?= $video->channelTitle ?>
            </span>
            <span class="video-card_overlay"></span>
        </span>
    </a>
    <h4 class="video-card_title"><a href="<?= $videoUrl ?>"><?= $video->title ?></a></h4>
    <span class="video-card_time-ago"><?= $video->timeAgo ?></span>
</div>