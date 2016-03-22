<?php 
require("fpdf/fpdf.php");
?>
<html>
<table id="tableau" class="table" >

				<tr>
	<th class="success"></th>
	<th class="success"></th>
	<th class="success"></th>
	<th class="success"></th>
		<tr>
			<th class="active">Réservation(s)</th>

<?php

// pax = reservation
$sql = ("SELECT COUNT(r.pax)as PAX FROM reservation r ;");
$result = $bdd->query($sql);
$columns = $result->fetch();
$pax = $columns['PAX'];

echo' 

		<th class="info">'.$pax.'</th>
		</tr>'
?>
<tr>
		<th class="active">Client(s)</th>
<?php
$sql =("SELECT SUM(pax) as pax FROM reservation");
$result = $bdd->query($sql);
$columns = $result->fetch();
$nb = $columns['pax'];

echo' 
		<th class="info">'.$nb.'</th>
		</tr>'
?>
	<tr>
	<th class="active">Gala TTC</th>
			
			
<?php
include "Prix.php";
// Total
$sql = ("SELECT SUM($prixdbl*r.resdbl + $prixsgl*r.ressgl + $prixnonresident*r.nonresident + $prixoffert*r.offert + $prixspecial*r.special + $prixenfantm*r.enfantm + $prixenfantp*r.enfantp)as CA FROM clients c, reservation r WHERE c.idclients=r.idclients;");
$result = $bdd->query($sql);
$columns = $result->fetch();
$nb = $columns['CA'];

echo' 

		<th class="info">'.$nb.'€</th>
		</tr>'
?>
	<tr>
	<th class="success"></th>
	<th class="success"></th>
	<th class="success"></th>
	<th class="success"></th>

<tr>
<tr class="active">
			<th>Type</th>
			<th>Nombre</th>
			<th>unitaire</th>
			<th>Total</th>
		<tr>
	<th class="active">Res DBL 455€</th>
<?php
include "Prix.php";
//RESDBL
$sql = ("SELECT SUM(r.resdbl)as resdbl FROM reservation r ;");
$result = $bdd->query($sql);
$columns = $result->fetch();
$resdbl = $columns['resdbl'];

echo' 
		<th id="nombre">'.$resdbl.'</th>
		<th>'.$prixdbl.'</th>'
?>
<?php
include "Prix.php";
//total prix RESDBL
$sql = ("SELECT SUM(r.resdbl*$prixdbl)as resdbl FROM reservation r ;");
$result = $bdd->query($sql);
$columns = $result->fetch();
$tresdbl = $columns['resdbl'];

echo' 
		<th>'.$tresdbl.'€</th>		
		
		
		</tr>'
?>
<tr>
	<th class="active">Res SGL 330€</th>
<?php
//RESSGL
$sql = ("SELECT SUM(r.ressgl)as ressgl FROM reservation r ;");
$result = $bdd->query($sql);
$columns = $result->fetch();
$ressgl = $columns['ressgl'];

echo' 
		<th>'.$ressgl.'</th>
		<th>'.$prixsgl.'</th>'
?>
<?php
include "Prix.php";
//total prix RESSGL
$sql = ("SELECT SUM(r.ressgl*$prixsgl)as ressgl FROM reservation r ;");
$result = $bdd->query($sql);
$columns = $result->fetch();
$ressgl = $columns['ressgl'];

echo' 
		<th>'.$ressgl.'€</th>
		</tr>'
?>

<tr>
	<th class="active">Non résident</th>
<?php
//Non resident
$sql = ("SELECT SUM(r.nonresident)as nonresident FROM reservation r ;");
$result = $bdd->query($sql);
$columns = $result->fetch();
$nonresident = $columns['nonresident'];

echo' 
		<th id="nombre">'.$nonresident.'</th>
		<th>'.$prixnonresident.'</th>'
		
?>
<?php
include "Prix.php";
//total prix Non resident
$sql = ("SELECT SUM(r.nonresident*$prixnonresident)as nonresident FROM reservation r ;");
$result = $bdd->query($sql);
$columns = $result->fetch();
$nonresident = $columns['nonresident'];

echo' 
		<th>'.$nonresident.'€</th>
		</tr>'
?>

<tr>
	<th class="active">Offert</th>
	<?php
//Offert
$sql = ("SELECT SUM(r.offert)as offert FROM reservation r ;");
$result = $bdd->query($sql);
$columns = $result->fetch();
$offert = $columns['offert'];

echo' 
		<th id="nombre">'.$offert.'</th>
		<th>'.$prixoffert.'</th>'
?>
<?php
include "Prix.php";
//total prix Offert
$sql = ("SELECT SUM(r.offert*$prixoffert)as offert FROM reservation r ;");
$result = $bdd->query($sql);
$columns = $result->fetch();
$offert = $columns['offert'];

echo' 
		<th>'.$offert.'€</th>
		</tr>'
?>
<tr>
	<th class="active">Special</th>
<?php
//Special
$sql = ("SELECT SUM(r.special)as special FROM reservation r ;");
$result = $bdd->query($sql);
$columns = $result->fetch();
$special = $columns['special'];

echo' 
		<th>'.$special.'</th>
		<th>'.$prixspecial.'</th>'
		
?>
<?php
include "Prix.php";
//total prix Special
$sql = ("SELECT SUM(r.special*$prixspecial)as special FROM reservation r ;");
$result = $bdd->query($sql);
$columns = $result->fetch();
$special = $columns['special'];

echo' 
		<th>'.$special.'€</th>
		</tr>'
?>

<tr>
	<th class="active">Enfant -10 ans</th>
<?php
//Enfantmoins
$sql = ("SELECT SUM(r.enfantm)as enfantm FROM reservation r ;");
$result = $bdd->query($sql);
$columns = $result->fetch();
$enfantm = $columns['enfantm'];

echo' 
		<th>'.$enfantm.'</th>
		<th>'.$prixenfantm.'</th>'
		
?>
<?php
include "Prix.php";
//total prix Enfantmoins
$sql = ("SELECT SUM(r.enfantm*$prixenfantm)as enfantm FROM reservation r ;");
$result = $bdd->query($sql);
$columns = $result->fetch();
$enfantm = $columns['enfantm'];

echo' 
		<th>'.$enfantm.'€</th>
		</tr>'
?>
<tr>
	<th class="active">Enfant 10/16 ans</th>
<?php

//Enfantplus
$sql = ("SELECT SUM(r.enfantp)as enfantp FROM reservation r ;");
$result = $bdd->query($sql);
$columns = $result->fetch();
$enfantp = $columns['enfantp']; 

echo' 
		<th>'.$enfantp.'</t>
		<th>'.$prixenfantp.'</th>'
?>
<?php
include "Prix.php";
//total prix Enfantplus
$sql = ("SELECT SUM(r.enfantp*$prixenfantp)as enfantp FROM reservation r ;");
$result = $bdd->query($sql);
$columns = $result->fetch();
$enfantp = $columns['enfantp']; 

echo' 
		<th>'.$enfantp.'€</th>
		
		</tr>'
?>

<script type="text/javascript"> 

var a = document.getElementById("tableau").rows; 
var l = a.length;
var c = a[13].cells[1].innerHTML;
var tab = new Array();
for(var i=7; i<13; i++)
	{	
		var c = a[i].cells[1].innerHTML;
		tab.push(c);
		console.log(c);
	}
	console.log(tab);
	var tot = 0;
	for(var j=0; i<tab.length; j++)
	{	
		tot = tab[j] + tot;
		console.log(tot);
	}
	console.log(tab.sum());
	
// var tab = document.getElementById("tableau").rows[2].innerHTML; //l'array est stocké dans une variable
// var t =   document.getElementById('tableau').innerHTML;


</script> 

    
</html>
