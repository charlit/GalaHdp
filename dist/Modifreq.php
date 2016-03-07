<?php
include "Menu.php";
require('configuration.php');
?>

<?php
if(isset($_POST['identifiant'])) $identifiant=$_POST['identifiant'];
else $identifiant="";
$req = $bdd->exec("DELETE FROM clients WHERE idclients = '$identifiant'");
try
{
$bdd->query($req);

}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}

echo "Suppression identifiant numero : ",$identifiant;

?>
<?php
sleep(1); 
header('Location: ListeGala.php');      
?>