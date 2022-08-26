<?php $title = "Le blog de l'AVBN"; ?>

<?php ob_start(); ?>
<h1>Le super blog de l'AVBN !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>
<!-- page layout to show an individual post -->
<div class="news">
    <h3>
        <?= htmlspecialchars($post->title) ?>
        <em>le <?= $post->frenchCreationDate ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post->content)) ?>
    </p>
</div>

<h2>Commentaires</h2>
<!-- form to create the comment -->
<form action="index.php?action=addComment&id=<?= $post->identifier ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<!-- show all the comments for an individual post -->
<?php
foreach ($comments as $comment) {
?>
    <p><strong><?= htmlspecialchars($comment->author) ?></strong> le <?= $comment->frenchCreationDate ?></p>
    <p><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<!-- css import, title, body content obtained by ob_get_clean -->
<?php require('layout.php') ?>