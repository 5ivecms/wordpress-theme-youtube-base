<?php
/**
 * @var Comment[] $comments
 */

$comments = $args['comments'] ?? [];

?>

<?php if (count($comments) > 0): ?>
    <div class="comments">
        <?php foreach ($comments as $comment): ?>
            <div class="comments_item">
                <div class="comments_item-head d-flex justify-content-start align-items-center">
                    <span class="comments_item-author"><?= $comment->author ?></span>
                    <span class="comments_item-time-ago"><?= $comment->timeAgo ?></span>
                </div>
                <div class="comments_item-text"><?= $comment->text ?></div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
