<?php
// maak een bevestig pagina voor het verwijderen van een mededwerker
?>
<div class="container">
<h1> Weet u zeker dat u de reservering van <?php echo getCustomer($reservation['customer_id'])['name']; ?> wilt verwijderen?</h1>
<form method ="POST" action='<?=URL?>reservation/destroy/<?php echo $reservation["id"]?>'>
	<input type="hidden" name="id" value="<?=$reservation["id"] ?>"/>
	<input type='submit'>
</form>
</div>
