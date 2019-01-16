<?php

require_once 'database.php';

function getBlogs($titel = '', $beginDatum = '', $sorterenOpTitel = false, $sorteerAflopend=false) {
    $dbh = getDbHandler();

    try {
        // TODO: Prepared statement gebruiken ivm SQL Injection.
        $query = "select * from blog where 1=1";

        if ($titel !== '') {
            $query .= " and titel like '%$titel%'";
        }

        // TODO: Filteren op datum.
        if ($beginDatum !== '') {
            $query .= " and datum < $beginDatum";
        }

        if ($sorterenOpTitel) {
            $query.=" order by datum";
            if ($sorteerAflopend) {
                $query .= " desc";
            }
        }

        echo $query;
        //$query = $dbh->prepare($query);
        // $results = $query->execute();
        $results = $dbh->query($query);
    } catch (PDOException $e) {
        die("Fout met de database: {$e->getMessage()} " );
    }

    return $results->fetchAll(PDO::FETCH_ASSOC);
}

function blogsAlsMooieHtmlTabel($resultSet) {
    $sqlResults = "<table>";
    $sqlResults .= "<tr><th>Id</th><th>Titel</th><th>Body</th></tr>";

    foreach($resultSet as $row) {
        $sqlResults .= "<tr><td>$row[id]</td><td>$row[titel]</td><td>$row[body]</td></tr>";
    }
    $sqlResults .= "</table>";
    return $sqlResults;
}
