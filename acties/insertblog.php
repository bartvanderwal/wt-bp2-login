<?php
require_once '../_includes/database.php';

if (!isset($_POST['titel'])) {
    die("Alleen posten naar deze pagina!");
}

$titel = $_POST['titel'];
$body = $_POST['body'];

blogOpslaan($titel, $body);

function blogOpslaan($titel, $body) {
    $dbh = getDbHandler();

    $query = $dbh->prepare("insert into blog (titel, body) values (?, ?)");
    $query->execute([$titel, $body]);
}

echo $titel;
echo $body;
// Redirect terug naar blogs overzicht
header('Location: ../');