<?php
    require_once '_includes/functions.php';
    session_start();

    if (isset($_SESSION['gebruikersnaam'])) {
        $gebruikersnaam = $_SESSION['gebruikersnaam'];
    }

?>
<!doctype html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Thema site - Login</title>
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <?php include '_includes/header.php'; ?>
        <form action="acties/do-login.php" method="post" class="big-login-form">
            <div class="foutmelding">
                <?php
                    if (isSessieGeladen() && isset($_SESSION['foutmelding'])) {
                        echo $_SESSION['foutmelding'];

                        // Na tonen resetten van foutmelding, zodat gebruiker deze maar 1 keer ziet.
                        $_SESSION['foutmelding'] = '';
                    }
                ?>
            </div>
            <div>
                <label for="login">Login</label>
                <input type="text" value="<?= $gebruikersnaam ?>" placeholder="login..." name="login">
            </div>
            <div>
                <label for="wachtwoord">Wachtwoord</label>
                <input id="wachtwoord" name="wachtwoord" type="password" name="login">
            </div>
            <div>
                <label for=""></label>
                <input type="submit" value="Login">
            </div>
        </form>
        <?php // TODO: Maak footer.
            //include '_includes/footer.php';
        ?>

    </body>
</html>
