<?php
// maak een bevestig pagina voor het verwijderen van een mededwerker
?>
<div class="container">
<h1> Weet u zeker dat u <?php echo $race['name']; ?> wilt verwijderen?</h1>
<form method ="POST" action='<?=URL?>race/destroy/<?php echo $race["id"]?>'>
	<input type="hidden" name="id" value="<?=$race["id"] ?>"/>
	<input type='submit'>
</form>
</div>
