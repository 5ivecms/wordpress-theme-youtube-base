<?php
$request = $_SERVER['REQUEST_URI'];
$request = trim($request, '/');
$parts = explode('/', $request);

$videoId = strrev($parts[1]);

?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex,nofollow">
    <title>Player</title>

    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/plyr/plyr.css" />
    <script src="<?= get_template_directory_uri() ?>/assets/plyr/plyr.min.js"></script>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }

        .plyr__video-embed {
            padding-bottom: 56.25% !important;
        }

        .plyr--video {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>

<div class="plyr__video-embed" id="player">
    <iframe src="https://www.youtube.com/embed/<?= $videoId ?>"    allowfullscreen
            allowtransparency
            allow="autoplay"></iframe>
</div>

<script>
    const player = new Plyr('#player', {
        captions: {
            active: true
        }
    });
    window.player = player;
</script>
</body>
</html>
