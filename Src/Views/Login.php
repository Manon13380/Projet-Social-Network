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
        <section>
            <h2>Login</h2>
            <form method="POST">
                <input type="email" placeholder="Mail" name="mail">
                <?php if (isset ($errorUserIntoDB)) {
                    echo "<p>" . $errorUserIntoDB . "</p>";
                } ?>
                <input type="text" placeholder="Mot de passe" name="password">
                <?php if (isset ($errorPasswordIntoDB)) {
                    echo "<p>" . $errorPasswordIntoDB . "</p>";
                } ?>
                <button type="submit" name="login">Login</button>
            </form>
            <a href="/subscribe">S'inscrire</a>
        </section>
    </main>
</body>

</html>