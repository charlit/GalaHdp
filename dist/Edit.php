<?php
include "Menu.php";
require('configuration.php');
    // new data
    $nom = $_POST['nom'];
	$numTable = $_POST['numTable'];
	$telephone = $_POST['telephone'];
	$pax = $_POST['pax'];
	$resdbl = $_POST['resdbl'];
	$ressgl = $_POST['ressgl'];
	$nonresident = $_POST['nonresident'];
    $offert = $_POST['offert'];
	$enfantm = $_POST['enfantm'];
	$enfantp = $_POST['enfantp'];
    $idclients = $_POST['memids'];
    // query
    $sql = "UPDATE clients 
            SET nom=?, numTable=?, telephone=?,pax=?,resdbl=?,ressgl=?,nonresident=?,offert=?,special=?,enfantm=?,enfantp=?
    		WHERE id=?";
    $q = $db->prepare($sql);
    $q->execute(array($nom,$numTable,$telephone,$pax,$resdbl,$ressgl,$nonresident,$offert,$special,$enfantm,$enfantp,$idclients));
    header("location: index.php");
?>
 