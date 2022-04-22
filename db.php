<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=credit', 'root', '');
} catch (Exception $th) {
    die("Erreur de connexion à la base de données");
}
?>