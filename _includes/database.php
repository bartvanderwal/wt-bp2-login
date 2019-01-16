<?php
function getDbHandler() {
    $dbType = 'mysql';
    try {
        if ($dbType === 'mssql') {
            // SQL Server variant.
            $hostname = "(local)";    // naam van server
            $dbname = "WorldWideImporters";        // naam van database
            $username = "sa";     // gebruikersnaam
            $pw = "";        // password
            $dbh = new PDO("mssql:host=$hostname;dbname=$dbname", "$username", "$pw");
        } else {
            // MySql
            $hostname = "localhost";    // naam van server
            $dbname = "belgie";        // naam van database
            $username = "root";     // gebruikersnaam
            $pw = "";        // password
            $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", "$username", "$pw");
        }
    } catch (PDOException $e) {
        die("Fout met de database: {$e->getMessage()}");
    }
    return $dbh;
}
