<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Social Network - Subscribe</title>
</head>

<body>
    <header>
        <h1>The Social Network</h1>
    </header>
    <main>
        <section>
            <h2>Subscribe</h2>
            <form method="POST">
                <label for="name">Nom : </label>
                <input id="name" type="text" name="name"><br>
                <?php if (isset ($errorName)) {
                    echo "<p>" . $errorName . "</p>";
                } ?>
                <label for="firstname">Prénom : </label>
                <input id="firstname" type="text" name="firstname"><br>
                <?php if (isset ($errorFirstname)) {
                    echo "<p>" . $errorFirstname . "</p>";
                } ?>
                <label for="mail">Email : </label>
                <input id="mail" type="text" name="mail"><br>
                <?php if (isset ($errorMail)) {
                    echo "<p>" . $errorMail . "</p>";
                } ?>
                <label for="password">Mot de passe: </label>
                <input id="password" type="text" name="password"><br>
                <?php if (isset ($errorPassword)) {
                    echo "<p>" . $errorPassword . "</p>";
                } ?>
                <button name="addNewUser" type="submit">S'inscrire</button>
            </form>
        </section>
    </main>
</body>

</html>