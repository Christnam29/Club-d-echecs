<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Ajout de materiel Google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
    <link rel="stylesheet" href="formulaire.css">
    
    <title>Formulaire</title>
</head>
<body>
    <div class="background"></div>

    <div class="form-container">
        <div class="form-header">
            <h1>Bienvenue au club d'échecs</h1>
            <h2>Inscrivez-vous !</h2> <br>
        </div>
        <form id="Myform" action="../Formulaire/formulaire.php" method="post">
            <label for="firstname">Entrez votre prénom: </label><br>
            <input type="text" name="firstname" id="firstname" placeholder="Votre prénom" required><br><br>
            <label for="lastname">Entrez votre nom de famille: </label><br>
            <input type="text" name="lastname" id="lastname" placeholder="Votre nom de famille" required><br><br>
            <label for="email">Entrez votre email: </label><br>
            <input type="email" name="email" id="email" placeholder="Votre mail" required><br><br>
            <label for="profession">Que faîtes-vous dans la vie?</label><br>
            <select name="profession" id="profession" onchange="OtherOption(this)">
                <option value="Scolaire">Scolaire</option>
                <option value="Fonctionnaire">Fonctionnaire</option>
                <option value="Entrepreneur">Entrepreneur</option>
                <option value="Sans profession">Sans profession</option>
                <option value="Autre">Autre (à préciser)</option>  
            </select>

            <!-- La boite qui s'ouvre pour le cas "Autre"-->
            <div id="autre_profession" style="display:none;">
                <br><label for="autre_profession">Précisez votre profession:</label>
                <input type="text" name="Autre_prof" id="Autre_prof">
            </div><br><br>

            <label for="motivations">Pourquoi vouloir nous rejoindre ? Hmm?</label><br>
            <textarea name="motivations" id="motivations" cols="50" rows="10"> </textarea><br><br>


            <input type="submit" value="Je veux vous rejoindre!">
        
        </form>
    </div>

<script src="formulaire.js"></script>
</body>
</html>

<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupère et nettoie les données envoyées par le formulaire
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $email = htmlspecialchars(trim($_POST['email']));
    
    // Vérifie si une profession a été choisie
    $profession = htmlspecialchars(trim($_POST['profession']));
    
    // Si "Autre" est sélectionné, on récupère la valeur du champ supplémentaire
    if ($profession === 'Autre') {
        $profession = htmlspecialchars(trim($_POST['Autre_prof']));
    }
    
    $motivations = htmlspecialchars(trim($_POST['motivations']));
    

    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['email'] = $email;
    $_SESSION['profession'] = $profession;
    $_SESSION['motivations'] = $motivations;

    
    //Création d'une connexion
    /*$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "CLUB";

    $conn = new mysqli($servername, $username, $password, $dbname);

    //Vérifions la connexion
    if ($conn->connect_error) {
        die("Echec de la connexion: ". $conn->connect_error);
    } 

        // Préparez la requête d'insertion manuelle
    $sql = "INSERT INTO Users (firstname, lastname, email, profession, motivations) 
            VALUES ('$firstname', '$lastname', '$email', '$profession', '$motivations')";

    if ($conn->query($sql) === TRUE) {
        echo "Données insérées avec succès.";
    } else {
        echo "Erreur : ".$sql . "<br>" . $conn->error;
    }
    
    // Ferme la connexion
    $conn->close();*/

} else {
    /* Si le formulaire n'a pas été soumis, redirige vers le formulaire
    header('Location: formulaire.html'); // 
    exit();*/
    //echo "Non autorisé";
}
?>