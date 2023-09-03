<?php
/**
 * @var VideoModel $video
 * @var $metaDescription string
 * @var $videoObjectDescription string
 * @var $ogImgAlt string
 */

$video = $args['video'] ?? null;
$metaDescription = $args['metaDescription'] ?? '';
$videoObjectDescription = $args['videoObjectDescription'] ?? '';
$ogImgAlt = $args['ogImgAlt'] ?? '';

if ($video !== null):
    $thumbRelay = thumbRelay();
    $embedRelay = embedRelay();
    $relayDomain = getRelayDomain();
    $videoUrl = getVideoUrl($video->id, $video->title);

    $thumbUrl = "https://i.ytimg.com/vi_webp/<?= $video->id ?>/mqdefault.webp";
    if ($thumbRelay && strlen($relayDomain) > 0) {
        $thumbUrl = $relayDomain . "/img/" . strrev($video->id) . '/' . $videoUrl . '.webp';
    }

    $embedUrl = 'https://www.youtube.com/embed/' . $video->id;
    if ($embedRelay && strlen($relayDomain) > 0) {
        $embedUrl = $relayDomain . "/embed/" . strrev($video->id) . '/';
    }

    $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

    <div itemscope itemtype="http://schema.org/VideoObject">
        <meta itemprop="name" content="<?= $video->title ?>">
        <link itemprop="thumbnailUrl" href="<?= $thumbUrl ?>"/>
        <link itemprop="url" href="<?= $embedUrl ?>">
        <link itemprop="embedUrl" href="<?= $embedUrl ?>">
        <meta itemprop="description" content="<?= $videoObjectDescription ?>">
        <meta itemprop="duration" content="<?= $video->duration ?>">
        <meta itemprop="isFamilyFriendly" content="true">
        <meta itemprop="uploadDate" content="<?= $video->publishedAt ?>"
        <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
            <link itemprop="contentUrl" href="<?= $thumbUrl ?>">
            <meta itemprop="width" content="250">
            <meta itemprop="height" content="120">
        </span>
    </div>

    <meta name="referrer" content="origin" />
    <meta name="title" content="<?= $video->title ?>" />
    <meta name="description" content="<?= $metaDescription ?>" />
    <link rel="canonical" href="<?= $url ?>" />
    <link rel="image_src" href="<?= $thumbUrl ?>" />
    <meta property="og:title" content="<?= $video->title ?>" />
    <meta property="og:description" content="<?= $metaDescription ?>" />
    <meta property="og:type" content="video.other" />
    <meta property="og:url" content="<?= $url ?>" />
    <meta property="og:site_name" content="<?= get_bloginfo('name') ?>" />
    <meta property="og:image" content="<?= $thumbUrl ?>" />
    <meta property="og:image:url" content="<?= $thumbUrl ?>" />
    <meta property="og:image:secure_url" content="<?= $thumbUrl ?>" />
    <meta property="og:image:alt" content="<?= $ogImgAlt ?>" />
    <meta property="og:image:width" content="250" />
    <meta property="og:image:height" content="120" />
    <meta property="og:video:iframe" content="<?= $embedUrl ?>/">
    <meta property="og:video" content="<?= $embedUrl ?>" />
    <meta property="og:video:url" content="<?= $embedUrl ?>" />
    <meta property="og:video:secure_url" content="<?= $embedUrl ?>" />
    <meta property="og:video:type" content="text/html" />
    <meta property="og:video:type" content="text/html" />
    <meta property="ya:ovs:is_official" content="true"/>
    <meta property="ya:ovs:upload_date" content="<?= $video->publishedAt ?>"/>
    <meta property="ya:ovs:adult" content="false"/>
    <meta property="video:duration" content="<?= $video->durationSec ?>" />
    <meta property="ya:ovs:adult" content="false" />
    <meta property="ya:ovs:upload_date" content="<?= $video->publishedAt ?>" />

    <meta name="googlebot" content="index,follow,noodp">
    <meta name="robots" content="index,follow,noydir">

<?php endif; ?>