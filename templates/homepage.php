<?php $title = "Le blog de l'AVBN"; ?>
<!-- we define a title for the page -->

<!-- start a session with ob_start -->
<?php ob_start(); ?>
<h1>Le super blog de l'AVBN !</h1>
<p>Derniers billets du blog :</p>

<?php
foreach ($posts as $post) { /* <!-- loops through the posts to display them --> */
?>
    <!-- class of news for the posts -->
    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']); ?>
            <em>le <?= $post['french_creation_date']; ?></em>
        </h3>
        <p>
            <?= nl2br(htmlspecialchars($post['content'])); ?>
            <br />
            <!-- comments with the id of the post -->
            <em><a href="post.php?id=<?= urlencode($post['identifier']) ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
?>
<!-- cleans the session with the method -->
<?php $content = ob_get_clean(); ?>

<!-- we require the layout -->
<!-- it uses the content and title variables -->
<?php require('layout.php') ?>