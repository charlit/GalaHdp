<?php include "Menu.php"; ?>
<?php 
// Mon fichier de connection � la BDD en PDO
require('configuration.php');

	
if(!empty($_POST['nom'])) $nom=$_POST['nom'];
else $nom="";

if(isset($_POST['numTable'])) $numTable=$_POST['numTable'];
else $numTable="";

if(isset($_POST['telephone'])) $telephone=$_POST['telephone'];
else $telephone="";

if(isset($_POST['pax'])) $pax=$_POST['pax'];
else $pax="";

if(isset($_POST['choix'])) $choix=$_POST['choix'];
else $choix="";

if(isset($_POST['resdbl'])) $resdbl=$_POST['resdbl'];
else $resdbl="";

if(isset($_POST['ressgl'])) $ressgl=$_POST['ressgl'];
else $ressgl="";

if(isset($_POST['nonresident'])) $nonresident=$_POST['nonresident'];
else $nonresident="";
if(isset($_POST['offert'])) $offert=$_POST['offert'];
else $offert="";
if(isset($_POST['special'])) $special=$_POST['special'];
else $special="";
if(isset($_POST['enfantm'])) $enfantm=$_POST['enfantm'];
else $enfantm="";
if(isset($_POST['enfantp'])) $enfantp=$_POST['enfantp'];
else $enfantp="";

// on �crit la requ�te sql
$result = $bdd->exec("INSERT INTO clients(idclients, nom, numTable, telephone) VALUES('', '$nom', '$numTable', '$telephone')");

echo "\nPDO::errorCode(): ", $bdd->errorCode();

$insertId = $bdd->lastInsertId();
echo '<td>'."\r\n";
 
echo "valeur".$insertId;

$result = $bdd->exec("INSERT INTO reservation(id, pax, choix, resdbl, ressgl, nonresident, offert, special, enfantm, enfantp, idclients) VALUES('','$pax', '$choix', '$resdbl', '$ressgl', '$nonresident', '$offert', '$special', '$enfantm', '$enfantp', '$insertId')");
$insertIdr = $bdd->lastInsertId();
$arr = $bdd->exec("SELECT SUM(125*r.resdbl + 125*r.ressgl + 165*r.nonresident + 0*r.offert + 110*r.special + 50*r.enfantm + 110*r.enfantp)as CA FROM clients c, reservation r WHERE c.idclients=r.idclients;");
// $ca = $arr;
// echo "zerzerezr". $ca;
// $stmt = $bdd->exec("UPDATE reservation SET ca=$ca WHERE id =$insertIdr;");



// $result =  $bdd->exec("INSERT INTO tarif(idtarif, idreservation) VALUES('$insertId', '$insertIdr')");
// on ins�re les informations du formulaire dans la table
try
{
$bdd->query($result);

}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
// on affiche le r�sultat pour le visiteur
echo '<font color="green"><b><center>Inscritpion valide !</center></b></font>';
?>
<?php
sleep(1); 
header('Location: ListeGala.php');      
?>
</body>
</html>