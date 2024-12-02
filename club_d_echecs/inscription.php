<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du deuxième formulaire
    $login = htmlspecialchars(trim($_POST['login']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirmpwd = htmlspecialchars(trim($_POST['confirmpwd']));

    // Validation des mots de passe
    if ($password !== $confirmpwd) {
        echo "Les mots de passe ne correspondent pas.";
        exit();
    }

    // Hachage du mot de passe eh eh
    $password_hashed = password_hash($password, PASSWORD_BCRYPT);

    // Récupérer les données du premier formulaire depuis la session
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $email = $_SESSION['email'];
    $profession = $_SESSION['profession'];
    $motivations = $_SESSION['motivations'] ;

    
     //Création d'une connexion
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "CLUB";

    $conn = new mysqli($servername, $username, $password, $dbname);

    //Vérifions la connexion
    if ($conn->connect_error) {
        die("Echec de la connexion: ". $conn->connect_error);
    } 

    // Vérifier si le login existe déjà
    $sql_check = "SELECT * FROM users WHERE login = '$login'";
    $result = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result) > 0) {
        // Le login existe déjà
        echo "Ce nom d'utilisateur est déjà pris. Veuillez en choisir un autre.";
    } else {
        // Préparez la requête d'insertion manuelle
        $sql = "INSERT INTO Users (firstname, lastname, email, profession, motivations, login, password) 
        VALUES ('$firstname', '$lastname', '$email', '$profession', '$motivations', '$login', '$password_hashed')";

        if ($conn->query($sql) === TRUE) {
            echo "Données insérées avec succès.";
            //session_unset();
            //session_destroy();
            echo "<script> alert('Compte créé, connectez-vous!');</script>";
            header('Location: index.php');    
        } else {
        echo "Erreur : ".$sql . "<br>" . $conn->error;
        }
    }

    // Ferme la connexion
    $conn->close();

  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!--Icônes pour la visibilité des passwords-->
    <link rel="stylesheet" href="inscription.css">
    <title>Inscription</title>

    <style>
        html, body{
        font-family: Arial, Helvetica, sans-serif;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        }

        .background{
            position: fixed;
            top: 0%;
            left: 0px;
            width: 100%;
            height: 100%;
            background-image: url('img/jeu_d_echecs.jpg');
            background-color: #69261E;
            background-size: cover;
            background-position: center;
            filter: blur(1px);
            z-index: -1;
        }

        .form-header{
            text-align: center;
            margin-bottom: 30px;
        }

        .form-container{
            position: relative;
            z-index: 1;
            width: 500px;
            height: 550px;
            padding: 20px 80px;
            background-color: rgb(255, 255, 255, 0.3);
            border-radius: 20px;
            box-shadow: 0 0 10px rgb(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
        }

        label{
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%; /* S'assurer que les champs prennent toute la largeur */
            padding-right: 40px;
            padding: 10px; /* Espacement intérieur des champs */
            margin: 2% 0px; /* Espacement entre les champs */
            box-sizing: border-box; /* Inclure la bordure et le padding dans la taille totale */
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .password-container ul {
                padding: 0; /* Enlever le padding par défaut */
                margin: 0px 0px 10px 20px; /* Espacement entre l'input et la liste */
            }

        input[type="text"]:focus, input[type="password"]:focus {
            border: 1px solid #555;
            outline: none;
        }

        input[type="submit"] {
            display: block;
            width: 50%; 
            padding: 10px 20px;
            margin: 20px auto 0 auto;
            background-color: #4c74af; /* Couleur du bouton */
            color: white; /* Couleur du texte du bouton */
            border: none; /* Supprimer la bordure */
            border-radius: 5px; 
            transition: border 0.3s;
            cursor: pointer; /* Changement du curseur pour pointer */
        }

        input[type="submit"]:hover {
            border: none;
            background-color: #1e437a;
            transform: scale(1.05); /* Légère augmentation lors du survol */
        }


        /* Désactive le bouton si les mots de passe ne correspondent pas */
        #submitBtn:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
        /*--------------------------------------------------------*/

        /* Style pour les indications de validation */
        .valid {
            color: green;
        }
        .invalid {
            color: red;
        }

        /* Style pour les bordures des champs confirm password */
        input[type="password"]:invalid:not(:placeholder-shown) {
            border: 2px solid red;
        }
        input[type="password"]:valid:not(:placeholder-shown) {
            border: 2px solid green;
        }

        input:placeholder-shown{
            border: 1px solid #ccc;
        }

        /* Style pour les icônes */
        .icon {
            display: inline-block;
            width: 20px;
            height: 20px;
        }

        .icon.checkmark {
            background-color: green;
            clip-path: polygon(14% 44%, 0% 64%, 48% 100%, 100% 0%, 80% 0%, 42% 74%);
        }

        .icon.cross {
            background-color: red;
            clip-path: polygon(14% 14%, 0% 30%, 34% 50%, 0% 80%, 14% 100%, 50% 64%, 84% 100%, 100% 80%, 64% 50%, 100% 30%, 84% 14%, 50% 48%);
        } 
    </style>

    
</head>

<body>
    <div class="background"></div>

    <div class="form-container">
        <div class="form-header">
            <h1>Finalisez votre inscription!</h1>
            <h2>Nous sommes heureux de vous annoncer que votre demande a été approuvée! Concluons cette adhésion!</h2> 
        </div>

        <form action="inscription.php" method="post" id="InscriptionForm">

            <label for="login">Entrez votre nom d'utilisateur</label>
            <input type="text" name="login" id="login" placeholder="Nom d'utilisateur" required><br><br>
            
            <label for="password">Quel sera votre mot de passe?</label>
            <div class="password-container">
                <input type="password" name="password" id="password" placeholder="Mot de passe" required>
                <ul>
                     <li id="length" class="invalid">Minimum 4 caractères</li>
                     <li id="uppercase" class="invalid">Au moins une lettre majuscule</li>
                     <li id="number" class="invalid">Un chiffre requis</li>
                </ul>
            </div>

            <label for="confirmpwd">Confirmez votre mot de passe</label>
            <div class="confirm-pwd-container">
                <input type="password" name="confirmpwd" id="confirmpwd" placeholder="Réécrivez le mot de passe" required><br><br>
                <span id="confirmation_icon"></span>
            </div>
            
            <br><input type="submit" value="M'inscrire" id="submitBtn" disabled> <!-- Bouton désactivé au départ pour attendre la confirmation du pwd-->
        
        </form>
    </div>
    
    <!--Doit y avoir une page qui met Compte créé, connectez vous!-->

   
    <script> 
        document.addEventListener('DOMContentLoaded', () => {
        const password = document.getElementById('password');
        const confirmpwd = document.getElementById('confirmpwd');
        const submitBtn = document.getElementById('submitBtn');
        const lengthIndicator = document.getElementById('length');
        const uppercaseIndicator = document.getElementById('uppercase');
        const numberIndicator = document.getElementById('number');

        function validatePassword() {
            const passwordValue = password.value;
            const hasUpperCase = /[A-Z]/.test(passwordValue);
            const hasNumber = /\d/.test(passwordValue);
            const validLength = passwordValue.length >= 4;

            lengthIndicator.classList.toggle('valid', validLength);
            lengthIndicator.classList.toggle('invalid', !validLength);
            uppercaseIndicator.classList.toggle('valid', hasUpperCase);
            uppercaseIndicator.classList.toggle('invalid', !hasUpperCase);
            numberIndicator.classList.toggle('valid', hasNumber);
            numberIndicator.classList.toggle('invalid', !hasNumber);

            if (passwordValue !== confirmpwd.value) {
            confirmpwd.setCustomValidity('Les mots de passe ne correspondent pas.');
            } else {
            confirmpwd.setCustomValidity('');
        }
            // Enable submit button only if all conditions are met and passwords match
            submitBtn.disabled = !(validLength && hasUpperCase && hasNumber && passwordValue === confirmpwd.value);
        }

        password.addEventListener('input', validatePassword);
        confirmpwd.addEventListener('input', validatePassword);
        });
    </script>


</body>
</html>
