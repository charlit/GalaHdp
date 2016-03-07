<html>

	<table class="table">
		<tr>
			<th class="active">Identifiant</th>
			<th class="active">Nom</th>
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
			<th class="active">CA</th>
		</tr>
<?php
$arr = $bdd->query("SELECT c.idclients, c.nom, c.telephone, r.pax, r.choix, r.resdbl, r.ressgl, r.nonresident, r.offert, r.special, r.enfantm, r.enfantp, SUM(125*r.resdbl + 125*r.ressgl + 165*r.nonresident + 0*r.offert + 110*r.special + 50*r.enfantm + 110*r.enfantp)as CA FROM clients c, reservation r WHERE c.idclients=r.idclients GROUP BY c.idclients, c.nom, c.telephone, r.pax, r.choix, r.resdbl, r.ressgl, r.nonresident, r.offert, r.special, r.enfantm, r.enfantp;");
$arr->execute(array());     
                 
                        while ($donnees = $arr->fetch()) {
							// echo 'Le nombre de ligne ',(count($donnees));
                            echo '
                                <tr class="active">
									<td class="active">'.$donnees['idclients'].'</td>
                                    <td class="active">'.$donnees['nom'].'</td>
                                    <td class="active">0'.$donnees['telephone'].'</td>
                                    <td class="active">'.$donnees['pax'].'</td>
                                    <td class="active">'.$donnees['choix'].'</td>
									<td class="active">'.$donnees['resdbl'].'</td>
									<td class="active">'.$donnees['ressgl'].'</td>
									<td class="active">'.$donnees['nonresident'].'</td>
									<td class="active">'.$donnees['offert'].'</td>
									<td class="active">'.$donnees['special'].'</td>
									<td class="active">'.$donnees['enfantm'].'</td>
									<td class="active">'.$donnees['enfantp'].'</td>
									<td class="active">'.$donnees['CA'].'</td>
                               </tr>
                            ';
								
                        }
                        $arr->closeCursor();
                ?>
</table>     
</content>
</html>
		