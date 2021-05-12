<?php

$dsn = 'mysql:dbname=ComparOperator;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $bdd = new PDO($dsn, $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'connection bdd OK ';
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
