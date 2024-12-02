<?php 
include 'config.php'; // Fichier de configuration pour la connexion à la base de données


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $lastname = htmlspecialchars($_POST['lastname']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $matricule = htmlspecialchars($_POST['matricule']);
    $languages = isset($_POST['languages']) ? implode(", ", $_POST['languages']) : 'Aucun';

    // Vérifier si le login existe déjà
    $sql_check = "SELECT * FROM languages WHERE lastname = '$lastname' AND firstname = '$firstname' AND matricule = '$matricule'";
    $result = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result) > 0) {
        // L'entrée existe déjà
        echo '<script>alert("L\'entrée existe déjà!");</script>';
    
    } else {
        $sql = "INSERT INTO Languages (lastname, firstname, matricule, languages) 
        VALUES ('$lastname', '$firstname', '$matricule', '$languages')";
        
        if ($conn->query($sql) === TRUE) {
        echo "Les données ont été enregistrées avec succès.";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();  
    
    header("Location: liste_utilisateurs_langages.php");
    exit();
};
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        html, body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #ffe6f0, #fffaf5);

        }

        .form-container {
            position: relative;
            width: 500px;
            padding: 20px;
            border: none;
            border-radius: 20px;
            background-color: white ;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1{
        margin-bottom: 20px;
        }

        .form-header{
        text-align: center;
        margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
        }
        
        input[type="text"] {
            width: 100%;
            margin-bottom: 10px;
            border: none;
            border-bottom: 2px solid palevioletred;
            background-color: transparent;
            box-sizing: border-box;
        }

        input[type="text"]:focus {
        border: none;
        border-bottom: 2px solid palevioletred;
        outline: none;
        }

        button[type="submit"] {
            display: block;
            margin: 20px auto 0 auto;
            background-color: palevioletred;
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            width: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s; 
        }

        button[type="submit"]:hover {
            transform: translateY(-10px); 
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            background-color: #CD5C5C;        
        }
    </style>
</head>
<body>
    <div class="background"></div>

    <div class="form-container">
        <div class="form-header">
            <h1>Formulaire de compétences</h1>
            <h2>Veuillez remplir vos informations</h2>
            <br>
        </div>

        <form id="language_form" method="post" onsubmit="return validateForm()">
            <label for="lastname">Nom :</label>
            <input type="text" name="lastname" id="lastname" placeholder="Votre nom" required><br><br>

            <label for="firstname">Prénom :</label>
            <input type="text" name="firstname" id="firstname" placeholder="Votre prénom" required><br><br>

            <label for="matricule">Matricule (Ex: 100247) :</label>
            <input type="text" name="matricule" id="matricule" pattern="^\d{6}$" maxlength="6" placeholder="Votre matricule à 6 chiffres" required><br><br>

            <label>Langages de programmation maîtrisés :</label>
            <div>
                <button type="button" onclick="AllCheckboxes(true)">Tout sélectionner</button>
                <button type="button" onclick="AllCheckboxes(false)">Tout désélectionner</button><br><br>

                <input type="checkbox" name="languages[]" value="C" class="language-checkbox">
                <label for="C">C/C++/C#</label>

                <input type="checkbox" name="languages[]" value="Python" class="language-checkbox">
                <label for="Python">Python</label>

                <input type="checkbox" name="languages[]" value="HTML/CSS" class="language-checkbox">
                <label for="HTML/CSS">HTML/CSS</label>

                <input type="checkbox" name="languages[]" value="JAVASCRIPT" class="language-checkbox">
                <label for="JAVASCRIPT">JAVASCRIPT</label>

                <input type="checkbox" name="languages[]" value="PHP" class="language-checkbox">
                <label for="PHP">PHP</label>

                <input type="checkbox" name="languages[]" value="JAVA" class="language-checkbox">
                <label for="JAVA">JAVA</label><br>
            </div>

            <button type="submit">Envoyer</button>
        </form>
    </div>

    <script>
        function AllCheckboxes(checked) {
            const checkboxes = document.querySelectorAll('.language-checkbox')
            checkboxes.forEach((checkbox) => {
                checkbox.checked = checked;
            });
        }

        function validateForm() {
            const checkboxes = document.querySelectorAll('.language-checkbox');
            let isChecked = false;
            
            // Vérifier si au moins une case est cochée
            checkboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    isChecked = true;
                }
            });
            
            if (!isChecked) {
                alert("Veuillez sélectionner au moins une langue.");
                return false; // Empêche la soumission du formulaire
            }
            return true; // Autorise la soumission du formulaire
        }   
    </script>
</body>
</html>