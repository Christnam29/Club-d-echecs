<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Initiation au langage HTML</title>
    <link rel="stylesheet" href="dashboard.css">

</head>
<body>
    <header>
        <h1>Accueil</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="Accueil.html">Accueil</a></li>
            <li><a href="vous.php">A propos de vous</a></li>
            <li><a href="les_formulaires.php">Vos formulaires</a></li>
            <li><a href="logout.php">Se déconnecter</a></li>
        </ul>
    </nav>
    
    
    
    <section>
        <article>
            <h2>Le Club d'Echecs </h2>
            <p> 
                Le Club d'Échecs des Stratèges Émérites a été fondé pour rassembler les passionnés du jeu d'échecs, qu'ils soient débutants ou joueurs expérimentés. Situé au cœur de la ville, le club offre un espace convivial où les membres peuvent se rencontrer,
                échanger des stratégies et participer à des tournois amicaux. Chaque semaine, des séances d'entraînement sont organisées, animées par des joueurs chevronnés, pour aider chacun à perfectionner ses compétences.
                Le club met également en place des événements réguliers, tels que des soirées thématiques et des défis contre d'autres clubs, afin de promouvoir l'esprit de camaraderie et la compétition saine. 
                Les Stratèges Émérites sont déterminés à faire découvrir l'univers fascinant des échecs à tous ceux qui souhaitent s'y plonger.
            </p>
           
        
        </article>
        
        <article>
            <h2>Horaires et Lieu de rencontre</h2>
            <p>Bienvenue au Club d'Échecs des Stratèges Émérites ! Voici nos horaires de rencontre :</p>

            <table>
                <thead>
                    <tr>
                        <th>Jour</th>
                        <th>Heure</th>
                        <th>Type d'Événement</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lundi</td>
                        <td>18h00 - 20h00</td>
                        <td>Entraînement</td>
                    </tr>
                    <tr>
                        <td>Mercredi</td>
                        <td>18h00 - 20h00</td>
                        <td>Tournoi Amical</td>
                    </tr>
                    <tr>
                        <td>Vendredi</td>
                        <td>18h00 - 20h00</td>
                        <td>Analyse de Parties</td>
                    </tr>
                    <tr>
                        <td>Dimanche</td>
                        <td>14h00 - 16h00</td>
                        <td>Défis Interclubs</td>
                    </tr>
                </tbody>
            </table>
        
            <p>Nous espérons vous voir nombreux lors de nos rencontres ! Pour toute question, n'hésitez pas à nous contacter.</p>        </article>
    </section>
    
    <footer>
        <p> ©2024 LesStratègesEmerites.com. Tous droits réservés.</p>
    </footer>

</body>
</html>

