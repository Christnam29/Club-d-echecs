# Club-d-echecs

## Introduction
Ce projet est un site web interactif permettant aux utilisateurs de s'inscrire, de se connecter, et de gérer leurs informations. L'application offre une interface utilisateur 
intuitive, avec des fonctionnalités avancées telles que la génération d'une carte 
d'appartenance en PDF et la possibilité de consulter les formulaires d'autres 
utilisateurs ! Ecrit en HTML, CSS, JavaScript et PHP, ce projet individuel permet de
brasser les différentes notions abordées tout au long du cours d’Aspects Avancés des Technologies Web (AATW) à l'Institut de Formation et de Recherche en Informatique (IFRI)

## Structure du Site
### 1. Page d'accueil (index.php)
 La page d'accueil est la porte d'entrée du site. Elle accueille les utilisateurs et leur 
propose deux actions principales : s'inscrire ou se connecter.
• Le bouton "S'inscrire" : redirige vers le formulaire initial d'inscription au club 
d'échecs.
• Le bouton "Se connecter" : redirige vers la page de connexion.

### 2. Pages d'inscription 
**Étape 1 :** Formulaire du club d'échecs (club_form.php)
Première étape de l'inscription, où l'utilisateur doit remplir un formulaire 
d'adhésion à un club d'échecs. Il renseigne ses informations personnelles, sa 
profession, sa motivation… informations qui seront stockées dans la table ‘’users’’ 
de la base de données. Après validation, l'utilisateur est redirigé vers le formulaire 
d'inscription général.
Notons que le code a été créé de sorte qu’une inscription sans motivation sera 
automatiquement rejetée et renvoie vers une page (renvoi.html). Il faut donc 
que le champ ‘’motivations’’ contienne au moins un caractère.

**Étape 2 :** Formulaire d'inscription (inscription.php)
Permet à l'utilisateur de fournir des informations de base nécessaires pour créer 
un compte, notamment son login et son password qui doit respecter certaines 
règles définies sur la page. Ces infos sont stockées dans la même table ‘’users’’ et le 
mot de passe est haché. Il y a donc un script js entre les deux pages d’inscription 
qui permet d’envoyer toutes les informations à la database en une seule fois et 
pas formulaire pas formulaire !
Une fois le formulaire rempli et soumis, l'utilisateur est redirigé vers la page 
d'accueil (index.php) pour se connecter cette fois, avec les identifiants créés.

### 3. Page de connexion (connexion.php)
 Permet aux utilisateurs de se connecter au site après avoir finalisé leur inscription.
Après connexion réussie, l'utilisateur est redirigé vers le Dashboard.

**Tableau de Bord (Dashboard)**
Le Dashboard est la page principale où l'utilisateur gère ses informations et accède aux 
fonctionnalités principales. Il comprend quatre onglets dans la barre de navigation : 
*Accueil, À propos de vous, Vos formulaires, et Se déconnecter.*

**1. Accueil (accueil.php)**
Onglet par défaut, qui inclut un message de bienvenue et des informations générales. Il 
ne contient pas d’informations utiles pour le projet.

**2. À propos de vous (vous.php)**
 Page de profil de l'utilisateur connecté pour la vérification et la gestion de ses 
informations personnelles, avec des fonctionnalités apportant une plus-value au projet ! 
Découvrons-les :
Fonctionnalités
 -Vérification et modification : L'utilisateur est invité à vérifier les informations qu'il 
a saisies au moment de l'inscription au club d’échecs. Il peut modifier ces informations 
si nécessaire et la base de données est automatiquement mise à jour ! Pour ce faire, il n’a 
qu’à cliquer sur le bouton ‘’Non, je veux les modifier ! (modify.php)’’ 
 - Ajout d'une photo de profil : L'utilisateur est capable d’ajouter une photo de profil
à son compte ! (upload-photo.php)
 - Confirmation et téléchargement : Une fois les informations confirmées et une 
photo ajoutée, en cliquant sur le bouton ‘’Oui, elles sont correctes’’, un fichier PDF
nommé "carte d’appartenance" est généré et téléchargé, contenant les informations de 
l'utilisateur sous forme de carte d’identité. 
C’est une fonctionnalité exclusive à ce projet car elle n’est pas demandée mais ajoute 
une dimension plus personnalisée pour chaque utilisateur ! Il en est de même pour la 
modification du profil ou le téléchargement d’une photo.

**3. Vos formulaires (les_formulaires.php)**
Section dédiée aux formulaires des clubs (échecs et langages informatiques).
 Fonctionnalités :
 - Consultation des utilisateurs inscrits : L'utilisateur peut voir la liste complète 
des utilisateurs inscrits via le formulaire d’inscription et le formulaire de langages 
informatiques (pour la gestion des choix multiples dans la base de données) 
(language_form.php)
 - Ajout de nouveaux utilisateurs : L'utilisateur a la possibilité d'ajouter de 
nouveaux inscrits dans les formulaires du club d'échecs ou de langages informatiques.
 - Impression : L'interface propose une option pour imprimer la liste des 
utilisateurs qui est affichée.

**4. Se déconnecter (logout.php)**
L'onglet de déconnexion permet de terminer la session de l'utilisateur. En cliquant sur 
cet onglet, les données de session sont effacées, et l'utilisateur est redirigé vers la page 
d'accueil (index.php).

## Guide Technique
**1. Base de Données (appelée club)**
Tables principales :
 - users : contient les informations de base sur chaque utilisateur inscrit (nom, 
prénom, email, mot de passe, etc.) et les informations spécifiques au formulaire 
d’inscription au club d’échecs
 - languages : contient les informations spécifiques au formulaire de langages 
informatiques.

**2. Téléchargement PDF**
Fonctionnalité permettant de générer un fichier PDF ("carte d’appartenance") avec les 
informations utilisateur. Elle a été réalisée via la bibliothèque PHP FPDF

**3. Authentification et Sessions**
 - Authentification : Utilisation des sessions pour stocker l'état connecté/déconnecté 
de l'utilisateur.
 - Sécurité : Assurer la protection des informations utilisateur par hachage des mots de 
passe et gestion sécurisée des sessions.

## Conclusion
Ce système offre aux utilisateurs un moyen complet et intuitif de s'inscrire, de gérer 
leurs informations, et de participer activement aux clubs proposés. La génération de la 
carte en PDF, les options de modification, et l'accès aux formulaires de club sont des 
fonctionnalités qui apportent une grande valeur au projet et une bonne application de 
concepts étudiés
