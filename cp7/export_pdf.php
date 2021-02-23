<?php
include_once('test_session.php');
include_once('pdo_connect.php');
include_once('fpdf/fpdf.php'); //http://www.fpdf.org
$t=$_GET['t'];
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
$pdf->AddPage('L', 'A4', 0);

// Typo
$pdf->SetFont('Times','',10);

// Impression contenu table
try{
    if(!isset($_GET['t']) || empty($_GET['t'])) $pdf->MultiCell(0,30,'Table non trouvée');
    $sql="SELECT * FROM $t";
    $qry=$cnn->query($sql);
    $nb=$qry->columnCount();
    $width=277/$nb; //29.7cm - 2*1cm de marge
    // Lit et écrit le nom des colonnes
    $pdf->SetTextColor(255,255,255);
    for($i=0;$i<$nb;$i++){
        $meta=$qry->getColumnMeta($i);
        $pdf->Cell($width,5,utf8_decode($meta['name']),1,0,'C', true);
    }
    $pdf->Ln();
    $pdf->SetTextColor(0,0,0);
    // Lit et écrit les data
    while($row=$qry->fetch(PDO::FETCH_NUM)){
        for($i=0;$i<$nb;$i++){
            $pdf->Cell($width,5,utf8_decode($row[$i]),1,0);
        }
        $pdf->Ln();
    }
} catch(PDOException $err){
    $pdf->MultiCell(0,30, $err->getMessage());
}
unset($cnn);

// Renvoie du résultat
$pdf->Output('I', 'export.pdf');