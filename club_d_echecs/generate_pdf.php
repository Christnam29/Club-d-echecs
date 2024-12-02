<?php
session_start();
require('telechargement_pdf/fpdf.php');

$firstname = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : '';
$lastname = isset($_SESSION['lastname']) ? $_SESSION['lastname'] : '';
$profession = isset($_SESSION['profession']) ? $_SESSION['profession'] : '';
$photoPath = isset($_SESSION['photo']) ? $_SESSION['photo'] : 'upload_img/default.png';

class PDF extends FPDF
{
    function Header()
    {
        // Ajouter un titre avec une couleur de fond
        $this->SetFillColor(240, 240, 240); // Couleur de fond
        $this->Rect(10, 10, 190, 10, 'F'); // Dessine le fond du header
        
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, 'Carte d\'Appartenance', 0, 1, 'C');
        $this->Ln(5);
    }

    function IdentityCard($firstname, $lastname, $profession, $photoPath)
    {
        // Ajouter un fond de carte
        $this->SetFillColor(240, 240, 240); // Couleur de fond
        $this->Rect(10, 20, 190, 60, 'F'); // Dessine le fond de la carte (taille agrandie)

        // Photo de profil
        if (file_exists($photoPath)) {
            $this->Image($photoPath, 15, 25, 50, 50); // Ajustez la position et la taille de la photo
        } else {
            $this->SetXY(15, 25);
            $this->Cell(50, 50, 'Pas de photo', 1, 0, 'C');
        }

        // Informations personnelles
        $this->SetXY(70, 25); // Position des informations
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, "Nom : $firstname", 0, 1);
        $this->SetX(70);
        $this->Cell(0, 10, "Prenom : $lastname", 0, 1);
        $this->SetX(70);
        $this->Cell(0, 10, "Profession : $profession", 0, 1);
    }
}

// Création du PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->IdentityCard($firstname, $lastname, $profession, $photoPath);
$pdf->Output('D', 'Carte_appartenance.pdf');
?>
