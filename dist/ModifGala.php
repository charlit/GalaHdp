<html>

	<table class="table">
		<tr>
			<th class="active">Edit</th>
			<th class="active">Identifiant</th>
			<th class="active">Nom</th>
			<th class="active">Table</th>
			<th class="active">Telephone</th>
			<th class="active">PAX</th>
			<th class="active">Facturation</th>
			<th class="active">Res DBL 455€</th>
			<th class="active">Res SGL 330€</th>
			<th class="active">Non resident</th>
			<th class="active">Offert</th>
			<th class="active">Special</th>
			<th class="active">Enfant -10ans</th>
			<th class="active">Enfant 10/16ans</th>
			
		</tr>
<?php
$arr = $bdd->query("SELECT c.idclients, c.nom, c.numTable, c.telephone, r.pax, r.choix, r.resdbl, r.ressgl, r.nonresident, r.offert, r.special, r.enfantm, r.enfantp, SUM(125*r.resdbl + 125*r.ressgl + 165*r.nonresident + 0*r.offert + 110*r.special + 50*r.enfantm + 110*r.enfantp)as CA FROM clients c, reservation r WHERE c.idclients=r.idclients GROUP BY c.idclients, c.nom, c.telephone, r.pax, r.choix, r.resdbl, r.ressgl, r.nonresident, r.offert, r.special, r.enfantm, r.enfantp ORDER BY c.nom ASC;");
$arr->execute(array());     
                 
                        while ($donnees = $arr->fetch()) {
							?>
							
                            
                                <tr class="active">
									<td class="active"><a href ="Edit.php?=idclients<?php echo $donnees['idclients'];?>">Edit</td>
									<td class="active"><?php echo $donnees['idclients'] ?> </td>
                                    <td class="active"><?php echo $donnees['nom'] ?></td>
									<td class="active"><?php echo $donnees['numTable'] ?></td>
                                    <td class="active"><?php echo $donnees['telephone'] ?></td>
                                    <td class="active"><?php echo $donnees['pax'] ?></td>
                                    <td class="active"><?php echo $donnees['choix'] ?></td>
									<td class="active"><?php echo $donnees['resdbl']?></td>
									<td class="active"><?php echo $donnees['ressgl']?></td>
									<td class="active"><?php echo $donnees['nonresident']?></td>
									<td class="active"><?php echo $donnees['offert']?></td>
									<td class="active"><?php echo $donnees['special']?></td>
									<td class="active"><?php echo $donnees['enfantm']?></td>
									<td class="active"><?php echo $donnees['enfantp']?></td>
                               </tr>
							   <?php
                            							
                        }
                        $arr->closeCursor(); ?>
</table>     
</content>
</html>
		