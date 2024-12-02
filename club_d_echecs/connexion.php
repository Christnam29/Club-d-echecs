<?php
session_start(); // Rouvrir la session pour stocker les informations utilisateur
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = htmlspecialchars(trim($_POST['login']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Connexion à la base de données
    //Création d'une connexion
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "CLUB";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Vérifier la connexion
    if (!$conn) {
        die("Connexion échouée : " . mysqli_connect_error());
    }

    // Récupérer les informations utilisateur depuis la base de données
    $sql = "SELECT id, password FROM Users WHERE login = '$login'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); //Le login étant unique, une seule ligne est retournée)
        $password_hashed = $row['password'];

        // Vérification du mot de passe
        if (password_verify($password, $password_hashed)) {
            // Mot de passe correct, l'utilisateur est authentifié
            $_SESSION['user_id'] = $row['id'];  // Stocker l'ID dans la session
            $_SESSION['login'] = $login;        // Stocker le login dans la session
            header('Location: dashboard.php');  // Redirection après la connexion
            exit();

        } else {
            $error_message = "Mot de passe incorrect.";
        }

    } else {
        $error_message = "Nom d'utilisateur incorrect.";
    }

    // Fermer la connexion
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css">
    <title>Connexion</title>
<style>
        html, body {
        font-family: Arial, Helvetica, sans-serif;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    .background {
        position: fixed;
        top: 0%;
        left: 0px;
        width: 100%;
        height: 100%;
        background-image: url("img/jeu_d_echecs.jpg");
        background-size: cover;
        background-position: center;
        filter: blur(8px);
        z-index: -1;   
    }

    .form-container{
        position: relative;
        z-index: 1;
        width: 500px;
        padding: 20px;
        background-color: rgb(255, 255, 255, 0.3);
        border-radius: 20px;
        box-shadow: 0 0 10px rgb(0, 0, 0, 0.1);
        backdrop-filter: blur(5px);
    }

    h1{
        margin-bottom: 20px;
    }

    .form-header{
        text-align: center;
        margin-bottom: 20px;
    }

    label{
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    input[type="text"], input[type="password"] {
        width: 95%;
        padding: 10px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="text"]:focus, input[type="password"]:focus {
        border: 1px solid #555;
        outline: none;
    }

    input[type="submit"] {
        display: block;
        margin: 20px auto 0 auto;
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 50%;
        
    }
    input[type="submit"]:hover {
        background-color: #45a049;        
    }
    
</style>
</head>
<body>
    <div class="background"></div>
    

    <div class="form-container">
        <div class="form-header">
            <h1>Content de vous retrouvez!</h1>
            <h2>Identifiez-vous</h2>
        </div>
        <form method="post">
            <label for="login">Nom d'utilisateur :</label>
            <input type="text" id="login" name="login" placeholder="Login" required><br><br>
        
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" placeholder="Mot de passe"><br><br>
            
            <?php
            if (!empty($error_message)) {
                echo "<p style='color:red;'>$error_message</p>";
            }
            ?>
            
            <input type="submit" value="Se connecter">
            
            
        </form>
    </div>
    
</body>
</html>