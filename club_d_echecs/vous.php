<?php
session_start();
include 'config.php'; // Fichier de configuration pour la connexion à la base de données

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT firstname, lastname, profession, motivations, login, photo FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Stocke les informations de l'utilisateur dans des variables
    $user = $result->fetch_assoc();
    $firstname = $user['firstname'];
    $lastname = $user['lastname'];
    $profession = $user['profession'];
    $motivations = $user['motivations'];
    $login = $user['login'];
    $photoPath = !empty($user['photo']) ? $user['photo'] : 'upload_img/default.png';
} else {
    // Si aucun utilisateur n'est trouvé, rediriger
    header("Location: connexion.php");
    exit();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #573030;
            color: #fff;
            padding: 20px;
            align-items: center;
            display: flex;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><text y="50%" font-size="30" fill="rgba(255, 255, 255, 0.1)" text-anchor="middle" x="50%">🌸 🌸 🌸</text></svg>');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        header h2 {
            margin: 0; /* Supprimer la marge par défaut du h1 */
            margin-left: 10px; /* Espace entre l'icône et le texte */
        }   

        a {
            text-decoration: none; /* Supprimer le soulignement du lien */
            color: white; /* Couleur du texte */
            margin-right: 50px; /* Espace entre l'icône et le texte suivant */
        }

        .container {
            display: flex;
            flex-direction: column;
            padding: 20px;
            align-items: center;
        }

        .content-wrapper {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 1000px;
            margin: 20px;
            align-items: center;
        }

        .content {
            display: flex;
            flex-direction: column;
            width: 100%;
            gap: 20px;
        }


        .content aside {
            flex: 1;
            max-width: 300px;
            text-align: center;
            background-color: #e2e2e2;
            padding: 20px;
            border-radius: 8px;
            box-sizing: border-box;
            margin-left: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .Photo {
            height: 200px;
            width: 200px;
            border-radius: 50%;
            object-fit: cover;
        }

        .file-upload {
            padding: 20px;
        }

        section {
            flex: 2;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 600px;
        }

        section article h2, section article p {
            margin-bottom: 15px;
            text-align: left;
        }

        section button {
            margin-top: 10px;
            padding: 10px 20px;
            border: none;
            background-color: #4CAF50;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        section button:hover {
            background-color: #45a049;
        }

        /* Responsive Styles */
        @media (min-width: 768px) {
            .content {
                flex-direction: row;
            }

            aside {
                margin: 0;
            }
        }
    </style>
</head>
<body>
    <header>
        <a href="dashboard.php" style="text-decoration: none; color: white;">
        <i class="fas fa-home" style="font-size: 30px;"></i> Accueil
        </a>
        <h1>Bonjour <?php echo $firstname . ' ' . $lastname; ?></h1>
    </header>

    <div class="container">
        <div class="content-wrapper">
            <div class="content">
                <section>
                    <article>
                        <h2>Voici vos informations personnelles, sont-elles correctes?</h2>
                        <p>Nom: <?php echo $lastname; ?></p>
                        <p>Prénom: <?php echo $firstname; ?></p>
                        <p>Profession: <?php echo $profession; ?></p>
                        <p>Vos motivations: <?php echo $motivations; ?></p>
                        <p>Votre nom d'utilisateur: <?php echo $login; ?></p>
                    </article>
                    <button onclick="location.href='modify.php';">Non, je veux les modifier!</button>
                    <button onclick="location.href='generate_pdf.php';">Oui, elles sont correctes</button>
                </section>
                <aside>
                    <form action="upload_photo.php" method="post" enctype="multipart/form-data">
                        <img src="<?php echo $photoPath; ?>" alt="Photo de profil" class="Photo"> <br><br>
                        <label for="photo">Télécharger votre photo:</label>
                        <div class="file-upload">
                            <input type="file" name="photo" id="photo" accept="image/*" required>
                        </div>
                        <input type="submit" value="Télécharger" class="submit-btn">
                    </form>
                </aside>
            </div>
        </div>
    </div>
</body>
</html>
