<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Le blog de l'AVBN</title>
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <h1>Le super blog de l'AVBN !</h1>
    <p>Derniers billets du blog :</p>

    <?php
    //we loop through the posts array
    foreach ($posts as $post) {
    ?>

        <!-- this is a html part that is displayed for each post -->
        <div class="news">
            <h3>
                <!-- there we have the title and the date of the post -->
                <!-- htmlspecialchars for the  -->
                <?php echo htmlspecialchars($post['title']); ?>
                <em>le <?php echo $post['frenchCreationDate']; ?></em>
            </h3>
            <p>
                <?php
                // we display the content of the post
                //nl2br for the new line
                echo nl2br(htmlspecialchars($post['content']));
                ?>
                <br />
                <em><a href="#">Commentaires</a></em>
            </p>
        </div>
    <?php
    }
    ?>
</body>

</html>