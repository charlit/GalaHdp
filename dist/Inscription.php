<?php
include "Menu.php";
require('configuration.php');
?>
<head>
<script type="text/javascript">
function verifForm()
{
	var nom = verifChamp();
	var pax = verifInt(); 
	var paxx = verifPax();
	
	
   if(nom && pax && paxx)
	   
      return true;
   else
   {
      return false;
   }
}
function verifChamp()
{
	nom = document.form1.nom.value;
	pax = document.form1.pax.value;
	if (nom == "" )
	{
		document.getElementById("test").innerHTML = "Champ obligatoire 'nom'";
		console.log("retour:  "+nom);
		return false;
	}
	else
	{
		document.getElementById("test").innerHTML = "";
		
	}
	if (pax =="")
	{
		document.getElementById("test").innerHTML = "Champ obligatoire 'pax'";
		console.log("retour:  "+pax);
		return false;
	}
	else
	{
		document.getElementById("test").innerHTML = "";
		
	}
	return true
	
}
function verifInt()
{
	var pax = document.form1.pax.value;
	var resdbl = document.form1.resdbl.value;
	var ressgl = document.form1.ressgl.value;
	var nonresident = document.form1.nonresident.value;
	var offert = document.form1.offert.value;
	var special = document.form1.special.value;
	var enfantm = document.form1.enfantm.value;
	var enfantp = document.form1.enfantp.value;
	if(isNaN(pax))
	{
		document.getElementById("test").innerHTML = "Pax doit etre un nombre ";
		return false;
	}
	if(isNaN(resdbl))
	{
		document.getElementById("test").innerHTML = "resdbl doit etre un nombre ";
		return false;
	}
	if(isNaN(ressgl))
	{
		document.getElementById("test").innerHTML = "ressgl doit etre un nombre ";
		return false;
	}
	if(isNaN(nonresident))
	{
		document.getElementById("test").innerHTML = "nonresident doit etre un nombre ";
		return false;
	}
	if(isNaN(offert))
	{
		document.getElementById("test").innerHTML = "offert doit etre un nombre ";
		return false;
	}
	if(isNaN(nonresident))
	{
		document.getElementById("test").innerHTML = "nonresident doit etre un nombre ";
		return false;
	}
	if(isNaN(enfantm))
	{
		document.getElementById("test").innerHTML = "enfantm doit etre un nombre ";
		return false;
	}
	if(isNaN(enfantp))
	{
		document.getElementById("test").innerHTML = "enfantp doit etre un nombre ";
		return false;
	}
	return true;
}
function verifPax()
{
	var pax = document.form1.pax.value;
	var resdbl = document.form1.resdbl.value;
	var ressgl = document.form1.ressgl.value;
	var nonresident = document.form1.nonresident.value;
	var offert = document.form1.offert.value;
	var special = document.form1.special.value;
	var enfantm = document.form1.enfantm.value;
	var enfantp = document.form1.enfantp.value;
	var total;
	tableau =[resdbl, ressgl, nonresident, offert, special, enfantm, enfantp]
	console.log(tableau);
	
		var tot=0;
		
		tableau =[resdbl, ressgl, nonresident, offert, special, enfantm, enfantp]
		
		for(var i = 0;i<tableau.length;i++)
			{
				tot = (1*tableau[i]) + tot;	
			}
			console.log("total "+tot);
			
		if( pax != tot)
	{
		document.getElementById("test2").innerHTML = " La somme du Pax est fausse";
		console.log("erreur addition, pax = "+pax+"et tot = "+tot);
		console.log(tableau);
	
		
		return false;	
	}
	
	console.log("ca marche" );
	return true;
}

</script>
</head>
<div class ="row">
 <div class="col-md-2"></div>

<form name='form1' onsubmit='return verifForm();' action="cible.php" class="form-horizontal" method="post">
<div class="col-md-3">
  <div class="form-group">      
    <label class="">Nom *</label>
    <input class="form-control" name="nom" type="text">
  </div>
  <div class="form-group">      
    <label class="">Table</label>
    <input class="form-control" name="numTable" type="text">
  </div>
  <div class="form-group">      
    <label class="">Telephone</label>
    <input class="form-control" name="telephone" type="text">
  </div>
  <div class="form-group">
    <label class="">Pax *</label>
    <input class="form-control" name="pax" type="text" >
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
    <input class="form-control" name="resdbl" type="text">
  </div>
    <div class="form-group">      
    <label class="">Res SGL 330E</label>
    <input class="form-control" name="ressgl" type="text">
  </div>
    <div class="form-group">      
    <label class="">Non résident</label>
    <input class="form-control" name="nonresident" type="text">
  </div>
    <div class="form-group">      
    <label class="">Offert</label>
    <input class="form-control" name="offert" type="text">
  </div>
    <div class="form-group">      
    <label class="">Spécial</label>
    <input class="form-control" name="special" type="text">
  </div>
    <div class="form-group">      
    <label class="">Enfant -10ans</label>
    <input class="form-control" name="enfantm" type="text">
  </div>
    <div class="form-group">      
    <label class="">Enfant 10/16ans</label>
    <input class="form-control" name="enfantp" type="text">
  </div>
  <div class="form-group">
  <button id ="valider" class="btn btn-default" type="submit">Valider</button>
  </div>
  
</form>
</div>
<div class="col-md-2"></div>
</body>

			
			
			
	 
