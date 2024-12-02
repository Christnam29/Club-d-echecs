<?php

session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <style>
        .background{
            position: fixed;
            top: 0%;
            left: 0px;
            width: 100%;
            height: 100%;
            background-image: url(img/meme_pokemon_squirtle.png);
            background-size: cover;
            background-position: center;
            filter: blur(5px);
            z-index: -1;
        }
        
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            color: #000000;
            text-align: center;
        }

        .content{
            z-index: 1;

        }
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        p {
            font-size: 20px;
            margin-bottom: 40px;
        }
        .button {
            background-color: #3078ff; /* Couleur du bouton */
            border: none;
            border-radius: 5px;
            color: white;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            margin: 10px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s; /* Ajout d'une transition */
        }
        .button:hover {
            background-color: #000000; /* Couleur lors du survol */
            transform: scale(1.05); /* Légère augmentation lors du survol */
        }
        .button:active {
            transform: scale(0.95); /* Réduction lors du clic */
        }
    </style>
</head>
<body>
    <div class="background"></div>
    <div class="content">
        <h1>Bienvenue !</h1>
        <p>Veuillez vous connecter ou vous inscrire</p>
        <a href="http://localhost/club_d_echecs/connexion.php" class="button">Connexion</a> <!-- Lien vers la page de connexion -->
        <a href="http://localhost/club_d_echecs/echec_form.php" class="button">Inscription</a> <!-- Lien vers la page d'inscription -->
    </div>
    
</body>
</html>