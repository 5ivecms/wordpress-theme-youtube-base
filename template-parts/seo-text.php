<?php
/**
 * @var string $text
 */

if (isset($args)) {
    $text = $args['text'];
}
?>

<?php if (strlen($text) > 0): ?>
    <section class="page-description my-4">
        <p><?= $text ?></p>
    </section>
<?php endif; ?>