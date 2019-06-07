<?php
// maak een bevestig pagina voor het verwijderen van een mededwerker
?>
<div class="container">
<h1> Weet u zeker dat u <?php echo $horse['name']; ?> wilt verwijderen?</h1>
<form method ="POST" action='<?=URL?>horse/destroy/<?php echo $horse["id"]?>'>
	<input type="hidden" name="id" value="<?=$horse["id"] ?>"/>
	<input type='submit'>
</form>
</div>
