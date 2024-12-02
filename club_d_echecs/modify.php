<?php
session_start();
include 'config.php'; // Connexion à la base de données

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}

// Récupérer les informations actuelles de l'utilisateur
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM Users WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "Erreur lors de la récupération des informations.";
    exit();
}

// Sauvegarder les nouvelles informations après modification
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $profession = mysqli_real_escape_string($conn, $_POST['profession']);
    $motivations = mysqli_real_escape_string($conn, $_POST['motivations']);

    
    // Mettre à jour les informations dans la base de données
    $update_sql = "UPDATE Users SET firstname = '$firstname', lastname = '$lastname', profession = '$profession', motivations = '$motivations' WHERE id = '$user_id'";
    
    if (mysqli_query($conn, $update_sql)) {
        // Mise à jour des informations dans la session
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['profession'] = $profession;
        $_SESSION['motivations'] = $motivations;
        
        // Redirection vers la page de confirmation avec succès
        header("Location: vous.php?update_success=1");
        exit();
    } else {
        echo "Erreur lors de la mise à jour des informations : " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier vos informations</title>
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

        input[type="text"] {
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 95%;
        }

        input[type="text"]:focus {
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
            width: 70%;
            
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
            <h2>Modifier vos informations</h2>
        </div>
        <form action="modify.php" method="POST">
            <label for="firstname">Prénom:</label>
            <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($user['firstname']); ?>" required>

            <label for="lastname">Nom:</label>
            <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($user['lastname']); ?>" required>

            <label for="profession">Profession:</label>
            <input type="text" id="profession" name="profession" value="<?php echo htmlspecialchars($user['profession']); ?>" required>
            
            <label for="motivations">Pourquoi vouloir nous rejoindre ? Hmm?</label><br>
            <textarea name="motivations" id="motivations" cols="50" rows="10" value="<?php echo htmlspecialchars($user['motivations']); ?>" required></textarea>

            <input type="submit" value="Sauvegarder les modifications">
        </form>
    </div>
</body>
</html>
