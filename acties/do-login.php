<?php
    require_once '../_includes/database.php';

    $foutmelding = "Ongeldige combinatie gebruikersnaam en wachtwoord.";

    if (!isset($_POST['login'])) {
        echo $_POST['login'];
        die("Naar deze pagina mag je alleen posten");
    }

    var_dump($_POST);

    $login = $_POST['login'];

    // Wel eerst escapen om XSS te voorkomen, want gebruikersnaam wordt aan andere gebruikers getoond bij blog posts
    // (en aan gebruiker zelf, maar daarmee kan hij dan alleen zichzelf hacken).
    $login = htmlspecialchars($login);

    $wachtwoord = $_POST['wachtwoord'];
    $vanafPagina = $_POST['vanafPagina'];

    $query = "select password from bezoekers where login = ?";

    // Haal het gehashte wachtwoord op uit de database op basis van de loginnaam.
    $dbh = getDbHandler();
    $preparedStatement = $dbh->prepare($query);
    $resultSet = $preparedStatement->execute([$login]);

    if (!$resultSet) {
        $records = ['test'];
        echo $query;

        // Zet foutmelding en stuur naar login pagina.
        session_start();
        $_SESSION['gebruikersnaam'] = $login;
        $_SESSION['foutmelding'] = $foutmelding;
        header('location: ../login.php');
    } else {
        $records = $resultSet->fetchAll(PDO::FETCH_ASSOC);
    }

    echo "<br/>";
    var_dump($records);
    $hashedWachtwoord = $records[0];


    // Controleer of wachtwoord klopt met gehashte wachtwoord uit de database via standaard PHP functie.
    $geldigeLogin = password_verify($wachtwoord, $hashedWachtwoord);

    /*
    // TODO: Redirect.
    if ($geldigeLogin) {
        // Gebruikersnaam opslaan in sessie
        header('location: ../index');
    } else {
        $_SESSION['foutmelding'] = $foutmelding;
        header('location: login.php');
    }
    */
?>