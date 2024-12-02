<?php
// Configuration de la base de données
$host = 'localhost';
$username = 'root';
$password = ''; 
$db_name = 'CLUB'; 


// Création d'une connexion à la base de données
$conn = mysqli_connect($host, $username, $password, $db_name);

// Vérification de la connexion
if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}
?>
