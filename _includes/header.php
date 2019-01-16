<?php
    require_once 'functions.php';
    checkIncludePagina();

    // var_dump($_POST);

    if (isset($_POST['login'])) {
        $login = $_POST['login'];
        $isIngelogd = true;
    } else {
        $isIngelogd = false;
        $login = '';
    }
    $requestUri = $_SERVER['REQUEST_URI'];
?>
<header>
    <nav>
        <?php // TODO.. menu maken ?>
        <div>
            <h2>Hoofd menu 1</h2>
            <ul>
                <li><a href="/php/lessen/bp2">Home</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
        <div>
            <h2>Hoofd menu 2</h2>
            <ul>
                <li>Item 2-1</li>
                <li>Item 2-2</li>
            </ul>
        </div>
        <div>
            <h2>TODO: Meer menu...</h2>
        </div>
        <div class="login-form">
            <?php if($isIngelogd) { ?>
                <?= $gebruikersNaam ?>
            <?php } else { ?>
                <?php
                    // Op login pagina geen login formulier in header, want staat al in de body (met ook evt. foutmelding).
                    if(!strpos($requestUri, 'login.php')) { ?>
                        <form action="acties/do-login.php" method="post" class="login-form">
                            <input type="hidden" name="vanafPagina" value="<?= $requestUri ?>">
                            <label for="login">login</label>
                            <input type="text" required name="login" value="<?= $login ?>"/>
                            <label for="wachtwoord">wachtwoord</label>
                            <input type="password" required name="wachtwoord">
                            <input type="submit" required value="login">
                        </form>
                <?php } else { ?>
                    Je bent op de inlogpaging.
                <?php } ?>
            <?php } ?>
        </div>
    </nav>
</header>
