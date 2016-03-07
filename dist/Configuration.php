<?php
//connection PDO
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bootstrap', 'root', '');	
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>