<!-- title that is visible on the homepage view -->
<?php $title = "Le blog de l'AVBN"; ?>

<!-- ob start for starting the session -->
<?php ob_start(); ?>
<h1>Le super blog de l'AVBN !</h1>
<p>Derniers billets du blog :</p>

<?php
foreach ($posts as $post) {
?>
    <div class="news">
        <h3>
            <!-- displays the post and the creation date -->
            <?= htmlspecialchars($post->title); ?>
            <em>le <?= $post->frenchCreationDate; ?></em>
        </h3>
        <p>
            <!-- displays the content -->
            <?= nl2br(htmlspecialchars($post->content)); ?>
            <br />
            <!-- displays the link to the comments of the post -->
            <em><a href="index.php?action=post&id=<?= urlencode($post->identifier) ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
?>
<!-- cleans the session -->
<?php $content = ob_get_clean(); ?>

<!-- import the layout code, which has the imports for the css, and has the title -->
<?php require('layout.php') ?>