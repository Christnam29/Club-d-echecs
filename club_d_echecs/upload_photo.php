<?php
session_start();
include 'config.php'; // Assurez-vous que ce fichier contient la connexion à la base de données

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}

// Vérification si un fichier a bien été uploadé et qu'il n'y a pas d'erreurs
if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $targetDir = "upload_img/";  // Dossier de destination pour les images
    $fileName = basename($_FILES["photo"]["name"]);
    $target_file = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Types de fichiers autorisés
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($fileType, $allowedTypes)) {
        
        // Vérification du succès du téléchargement
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            // Connexion à la base de données
            if (!$conn) {
                die("Connexion à la base de données échouée : " . mysqli_connect_error());
            }
            
            // Mise à jour de la base de données avec le chemin de l'image
            $user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);
            $safeFilePath = mysqli_real_escape_string($conn, $target_file);
            $sql = "UPDATE Users SET Photo = '$safeFilePath' WHERE id = '$user_id'";
             
            if (mysqli_query($conn, $sql)) {
                // Mise à jour de la session avec le nouveau chemin de la photo
                $_SESSION['photo'] = $target_file;
                header("Location: vous.php?upload_success=1");
                exit();
            } else {
                echo "Erreur lors de la mise à jour de la base de données : " . mysqli_error($conn);
            }
        } else {
            echo "Erreur lors du téléchargement de l'image. Veuillez réessayer.";
        }
    } else {
        echo "Type de fichier non autorisé. Seuls les fichiers JPG, JPEG, PNG et GIF sont acceptés.";
    }
} else {
    echo "Aucun fichier téléchargé ou une erreur s'est produite pendant le téléchargement.";
}
?>
