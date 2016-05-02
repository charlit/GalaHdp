<?php 
require("fpdf/fpdf.php");
?>
<?php 
// Connexion à la BDD
$bddname = 'bootstrap';
$hostname = 'localhost';
$username = 'root';
$password = '';
$db = mysqli_connect ($hostname, $username, $password, $bddname);


// Création de la class PDF
class PDF extends FPDF {
    // Footer
    function Footer() {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Adresse
        $this->Cell(196,5,'',0,0,'C');
    }
}
// Activation de la classe
$pdf = new PDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Helvetica','',11);
$pdf->SetTextColor(0);

$position_entete = 20;

function entete_table($position_entete){
    global $pdf;
    $pdf->SetDrawColor(183); // Couleur du fond
    $pdf->SetFillColor(221); // Couleur des filets
    $pdf->SetTextColor(0); // Couleur du texte
    $pdf->SetY($position_entete);
	
    $pdf->SetX(8);
    $pdf->Cell(10,8,'Id',1,0,'L',1);
	
    $pdf->SetX(18); // 8 + 96
    $pdf->Cell(28,8,'Nom',1,0,'C',1);
	
	$pdf->SetX(46); // 104 + 10
    $pdf->Cell(24,8,'Telephone',1,0,'C',1);
	
	$pdf->SetX(70); // 104 + 10
    $pdf->Cell(14,8,'Table',1,0,'C',1); // epaisseur de la cellule
	
	$pdf->SetX(84); // 104 + 10
    $pdf->Cell(14,8,'PAX',1,0,'C',1);

	$pdf->SetX(98); // 104 + 10
    $pdf->Cell(24,8,'Facturation',1,0,'C',1);

	$pdf->SetX(122); // 104 + 10
    $pdf->Cell(22,8,'ResDBL',1,0,'C',1);
	
	$pdf->SetX(144); // 104 + 10
    $pdf->Cell(22,8,'ResSGL',1,0,'C',1);

	$pdf->SetX(166); // 104 + 10
    $pdf->Cell(24,8,'NonResident',1,0,'C',1);

	$pdf->SetX(190); // 104 + 10
    $pdf->Cell(18,8,'Offert',1,0,'C',1);  	
	
	$pdf->SetX(208); // 104 + 10
    $pdf->Cell(20,8,'Special',1,0,'C',1);
	
	$pdf->SetX(228); // 104 + 10
    $pdf->Cell(24,8,'enfant-10a ',1,0,'C',1);
	
	$pdf->SetX(252); // 104 + 10
    $pdf->Cell(24,8,'enfant+10a',1,0,'C',1);
	
    $pdf->Ln(); // Retour à la ligne
}
entete_table($position_entete);


$position_detail = 28; // Position à 8mm de l'entête
$req2 = "SELECT c.idclients, c.nom, c.numTable, c.telephone, r.pax, r.choix, r.resdbl, r.ressgl, r.nonresident, r.offert, r.special, r.enfantm, r.enfantp FROM clients c, reservation r WHERE c.idclients = r.idclients";
//$req2 = "SELECT idclients, nom, numTable, telephone FROM clients";
$rep2 = mysqli_query($db, $req2);
while ($row2 = mysqli_fetch_array($rep2)) {
	
    $pdf->SetY($position_detail);
    $pdf->SetX(8);
    $pdf->MultiCell(10,8,utf8_decode($row2['idclients']),1,'L');
	
    $pdf->SetY($position_detail);
    $pdf->SetX(18);
    $pdf->MultiCell(28,8,$row2['nom'],1,'C'); 	
	
    $pdf->SetY($position_detail);
    $pdf->SetX(46);
    $pdf->MultiCell(24,8,$row2['telephone'],1,'R');
	
	$pdf->SetY($position_detail);
    $pdf->SetX(70);
    $pdf->MultiCell(14,8,$row2['numTable'],1,'R');
	
	$pdf->SetY($position_detail);
    $pdf->SetX(84);
    $pdf->MultiCell(14,8,$row2['pax'],1,'R');
	
	$pdf->SetY($position_detail);
    $pdf->SetX(98);
    $pdf->MultiCell(24,8,$row2['choix'],1,'R');
	
	$pdf->SetY($position_detail);
    $pdf->SetX(122);
    $pdf->MultiCell(22,8,$row2['resdbl'],1,'R');
	
	$pdf->SetY($position_detail);
    $pdf->SetX(144);
    $pdf->MultiCell(22,8,$row2['ressgl'],1,'R');
	
	$pdf->SetY($position_detail);
    $pdf->SetX(166);
    $pdf->MultiCell(24,8,$row2['nonresident'],1,'R');
	
	$pdf->SetY($position_detail);
    $pdf->SetX(190);
    $pdf->MultiCell(18,8,$row2['offert'],1,'R');
	
	$pdf->SetY($position_detail);
    $pdf->SetX(208);
    $pdf->MultiCell(20,8,$row2['special'],1,'R');
	
	$pdf->SetY($position_detail);
    $pdf->SetX(228);
    $pdf->MultiCell(24,8,$row2['enfantm'],1,'R');
	
	$pdf->SetY($position_detail);
    $pdf->SetX(252);
    $pdf->MultiCell(24,8,$row2['enfantp'],1,'R');
	
    $position_detail += 8;
}

// Nom du fichier
$nom = 'ListingGala'.'.pdf';

// Création du PDF
$pdf->Output($nom,'I');?>

