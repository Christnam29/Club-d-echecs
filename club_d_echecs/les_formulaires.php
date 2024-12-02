<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;           
            align-items: center;
            justify-content: center;
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
            margin-right: 150px; /* Espace entre l'icône et le texte suivant */
        }

        h2{
            text-align: center;
        }

        .form-container {
            position: relative;
            width: 500px;
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

        .link {
            display: block;
            margin: 15px 0;
            padding: 10px;
            text-align: center;
            background-color: #573030;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .link:hover {
            background-color: #573030;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    
    <header>
        <a href="dashboard.php" style="text-decoration: none; color: black;">
            <i class="fas fa-home" style="font-size: 30px;"></i> Accueil
        </a>
        <h1>Vos formulaires</h1>
    </header>

        <h2>Que faisons-nous aujourd'hui ?</h2>

        <div class="form-container">
            <a href="liste_utilisateurs.php" class="link">Liste complète des utilisateurs</a>
            <a href="liste_utilisateurs_langages.php" class="link">Liste des utilisateurs inscrits au formulaire de langages</a>
            <a href="dashboard.php" class="link">Rien du tout</a>

        </div>

</body>
</html>
