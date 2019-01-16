<?php
  $wachtwoord  ='1234';
  $hashedWachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);

  require_once '_includes/blogs.php';

    if (isset($_GET['titel'])) {
        $titelFilter = $_GET['titel'];
    } else {
        $titelFilter = '';
    }
    if (isset($_GET['datum'])) {
        $sorterenOpDatum = $_GET['datum'];
    } else {
        $sorterenOpDatum = false;
    }
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP - Prepared statements</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <?php include_once '_includes/header.php'; ?>
    <?php include_once '_includes/blogs.php'; ?>
    <pre>
        wachtwoord: <?= $wachtwoord ?>
        hashedWachtwoord: <?= $hashedWachtwoord ?>
    </pre>
</body>
</html>