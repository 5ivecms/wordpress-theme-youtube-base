<?php
/**
 * @var $metaDescription string
 * @var $metaTitle string
 */

$metaDescription = $args['metaDescription'] ?? '';
$metaTitle = $args['metaTitle'] ?? '';

$protocol = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http');
$url = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$logoUrl = $protocol . '://' . trim($_SERVER['HTTP_HOST'], '/') . '/images/logo.svg'

?>

<meta name="description" content="<?= $metaDescription ?>">
<meta property="og:site_name" content="<?= get_bloginfo('name') ?>">
<meta property="og:url" content="<?= $url ?>">
<meta property="og:title" content="<?= $metaTitle ?>">
<meta property="og:image" content="<?= $logoUrl ?>">
<meta property="og:description" content="<?= $metaDescription ?>">
<link rel="canonical" href="<?= $url ?>">
<meta name="robots" content="index,follow">