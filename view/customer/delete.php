<?php
// maak een bevestig pagina voor het verwijderen van een mededwerker
?>
<div class="container">
<h1> Weet u zeker dat u <?php echo $customer['name']; ?> wilt verwijderen?</h1>
<form method ="POST" action='<?=URL?>customer/destroy/<?php echo $customer["id"]?>'>
	<input type="hidden" name="id" value="<?=$customer["id"] ?>"/>
	<input type='submit'>
</form>
</div>
