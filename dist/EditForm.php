<?php
include "Menu.php";
require('configuration.php');
?>
<?php
	
	$idclients=$_GET['idclients'];
	$result = $db->prepare("SELECT * FROM clients WHERE idclients= :userid");
	$result->bindParam(':userid', $idclients);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>

<form name='form1' onsubmit='return verifForm();' action="cible.php" class="form-horizontal" method="post">
<div class="col-md-3">
  <div class="form-group">      
    <label class="">Nom *</label>
    <input class="form-control" name="nom" type="text" value="<?php echo $donnees['nom']; ?>">
  </div>
  <div class="form-group">      
    <label class="">Table</label>
    <input class="form-control" name="numTable" type="text" value="<?php echo $donnees['numTable']; ?>">
  </div>
  <div class="form-group">      
    <label class="">Telephone</label>
    <input class="form-control" name="telephone" type="text" value="<?php echo $donnees['telephone']; ?>">
  </div>
  <div class="form-group">
    <label class="">Pax *</label>
    <input class="form-control" name="pax" type="text" value="<?php echo $donnees['pax']; ?>" >
  </div>
  <div class="form-group">
  <label for="sel1">Type facturation:</label>
  <SELECT class="form-control" name="choix" id="sel1">
				<option>Prepaye</option>
				<option>Sur place</option>
				<option>Offert</option>
				<option>CXL</option>
				<option>Sur son compte</option>
				</SELECT>
  </div>
   <div class="form-group">
    <label class=""></label>
    <h4 class="text-danger" id="test"> </h6>
  </div>
     <div class="form-group">
    <label class=""></label>
    <h4 class="text-danger" id="test2"> </h6>
  </div>
  </div>
  <div class="col-md-2"></div>
  <div class="col-md-3">
    <div class="form-group">      
    <label class="">Res DBL 455E</label>
    <input class="form-control" name="resdbl" type="text" value="<?php echo $donnees['resdbl']; ?>">
  </div>
    <div class="form-group">      
    <label class="">Res SGL 330E</label>
    <input class="form-control" name="ressgl" type="text" value="<?php echo $donnees['ressgl']; ?>">
  </div>
    <div class="form-group">      
    <label class="">Non résident</label>
    <input class="form-control" name="nonresident" type="text" value="<?php echo $donnees['nonresident']; ?>">
  </div>
    <div class="form-group">      
    <label class="">Offert</label>
    <input class="form-control" name="offert" type="text" value="<?php echo $donnees['offert']; ?>">
  </div>
    <div class="form-group">      
    <label class="">Spécial</label>
    <input class="form-control" name="special" type="text" value="<?php echo $donnees['special']; ?>">
  </div>
    <div class="form-group">      
    <label class="">Enfant -10ans</label>
    <input class="form-control" name="enfantm" type="text" value="<?php echo $donnees['enfantm']; ?>">
  </div>
    <div class="form-group">      
    <label class="">Enfant 10/16ans</label>
    <input class="form-control" name="enfantp" type="text" value="<?php echo $donnees['enfantp']; ?>">
  </div>
  <div class="form-group">
  <button id ="valider" class="btn btn-default" type="submit">Valider</button>
  </div>
  
</form>