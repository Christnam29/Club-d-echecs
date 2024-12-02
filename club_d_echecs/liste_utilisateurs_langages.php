<?php 
include 'config.php';

$sql = "SELECT * FROM languages";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>

    <style>
        html, body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #ffe6f0, #fffaf5);
        }

        header {
            background-color: #573030;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><text y="50%" font-size="30" fill="rgba(255, 255, 255, 0.1)" text-anchor="middle" x="50%">🌸 🌸 🌸</text></svg>');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .form-container {
            position: relative;
            width: 90%;
            padding: 20px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border: none;
            border-radius: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #573030;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        .link {
            display: block;
            margin-top: 20px;
            text-align: center;
            background-color: #573030;
            color: white;
            padding: 10px;
            border-radius: 25px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .link:hover {
            background-color: #CD5C5C;
        }

        .les_boutons {
            display: inline-block;
            width: 48%;
            vertical-align: top;
        }

        .no-print{
            display: block;
        }

        @media print {
            .no-print {
                display: none  
            } 
        }

    </style>

    <script>
        function printPage() {
            window.print();
        }
    </script>
</head>

<body>
    <div class="no-print">
        <header>
            <h1>Formulaire - Langages de programmation</h1>
        </header>
    </div>

    <div class="form-container">
    <h2>Liste des inscrits</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Matricule</th>
                <th>Langages maîtrisés</th>
            </tr>
            <?php 
                if ($result->num_rows > 0) : 
                    while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['matricule']; ?></td>
                            <td><?php echo $row['languages']; ?></td>
                        </tr>
                <?php endwhile; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4">Aucun utilisateur trouvé.</td>
                </tr>
            <?php endif; ?>
        </table>

        <div class="les_boutons">
            <div class="no-print">
                <a href="language_form.php" class="link">Ajouter un Nouvel Utilisateur</a>
                <a href="les_formulaires.php" class="link">Retour</a>
                <a href="javascript:void(0);" class="link" onclick="printPage()">Imprimer la Liste</a>
            </div>
        </div>
    
    </div>
</body>
</html>