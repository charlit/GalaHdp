<?php
include "Menu.php";
require('configuration.php');
?>
</br>
<div class="container">
<div class ="row">
<form  class="form-inline" action="Modifreq.php" method="post">

<div class="col-md-3"></div>
<div class="col-md-6">
		<div class="form-group">
			<label  for="identifiant">Identifiant</label>
			<input class="form-control" type="text" name="identifiant" /><br/><br/>
		</div>	
		<div class="form-group">
			<input class="btn btn-default" type="submit" value="Supprimer" /><br/><br/>
		</div>
		</div>
		</form>
<form action="imprimer.php" method="post">
	<input class="btn btn-default" type="submit" value="Imprimer" /><br/><br/>
</form>		
<div class="col-md-3"></div>
</div>
</div>

<div class="container">
<div class ="row">
<div class="col-md-1"></div>
<div class="col-md-10">
  

<?php
include "ModifGala.php";
?>
</div>
<div class="col-md-1"></div>
</div>
</div>