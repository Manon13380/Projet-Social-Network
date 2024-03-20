<?php
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Social Network - Login</title>
</head>

<body>
    <header>
        <h1>The Social Network</h1>
    </header>
    <main>
        <h2>Home</h2>
        <section>
            <h3>Welcome :
                <?= $UserId["firstname"] ?>
            </h3>
            <form method="post">
                <button type="submit" name="logOut">Déconnexion</button>
            </form>
        </section>
        <hr>
        <section>
            <h3>All Posts</h3>
            <form method="post">    
                <?php foreach ($posts as $key => $post) {
                    if (isset ($_POST['update']) && $_POST['update'] == $key) {
                        echo "<input name='newTitle' value='" . $post->getTitle() . "'> <br>
                              <input name='newMessage'value='" . $post->getMessage() . "'>
                              <p>" . $userPost['name'] . " " . $userPost['firstname'] . "</p>";
                    } else {
                        echo "<h4>" . $post->getTitle() . "</h4>
                              <p> " . $post->getMessage() . "</p>
                              <p><i> Author : " . $userPost['name'] . " " . $userPost['firstname'] . "</i></p>";
                    }
                    ?>

                    <?php if ($post->getAuthor() == $UserId['id']) {
                        if (isset ($_POST['update']) && $_POST['update'] == $key) {
                            echo "<button class='action_button' type='submit' name='confirm' value= '" . $post->getId() . "'>Confirm </button>";
                        } else {
                            echo "<button class='action_button' type='submit' name='update' value= '" . $key . "'>Update </button> ";
                        } ?>
                        <button type='submit' name='delete' value='<?= $post->getId() ?>'>Delete</button>
                    <?php } ?>
                    <hr>
                <?php } ?>
            </form>
        </section>
        <section>
            <h3>Add a Post</h3>
            <form method="post">
                <label for="title">Title :</label>
                <input id="title" name="title" type="text"> <br>
                <?php if (isset($errorTitle)) {echo "<p>" .$errorTitle . "</p>";}?>
                <label for="content">Content :</label>
                <input id="content" name="content" type="text"> <br>
                <?php if (isset($errorMessage)) {echo "<p>".$errorMessage. "</p>";}?>

                <button type="submit" value="<?php $_SESSION['userId'] ?>" name="addPost">Add</button>
            </form>
        </section>
    </main>
</body>

</html>