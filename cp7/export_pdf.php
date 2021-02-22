<?php
include_once('test_session.php');
include_once('pdo_connect.php');
include_once('fpdf/fpdf.php'); //http://www.fpdf.org

// Classe qui étend FPDF
class MyPDF extends FPDF{
    // Surcharge la méthode HEADER : personnalise
    public function Header(){
        // Logo
        $this->Image('index.jpeg', 10, 5, 40, 20);
        $this->SetTextColor(255,0,0);
        $this->SetFont('Arial', 'B', 20);
        // Text
        $this->Cell(0, 10, 'Les Darons Codeurs', 0, 0, 'C');
        $this->Ln(20);
    }
    // Surcharge la méthode FOOTER : personnalise
    public function Footer()
    {
        // Positionnement 1.5cm du bas
        $this->SetY(-15);
        // Typo
        $this->SetFont('Times', 'I', 10);
        // Text
        $this->cell(0,10,'Page '.$this->PageNo().' sur {nb}',0,'C');
    }
}

// Appelle la classe créée ci-dessus : impression en PDF
$pdf = new MyPDF();

// Gestion du nb de pages
$pdf->AliasNbPages();

// Création de la page
$pdf->AddPage('P', 'A4', 0);

// Test
$pdf->SetFont('Times','',10);
for($i=1;$i<1001;$i++){
    $pdf->Cell(0,10,'Ligne No '.$i,1,2);
}

// Renvoie du résultat
$pdf->Output('I', 'export.pdf');