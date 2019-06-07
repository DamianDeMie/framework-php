<div class="container">
<h1>Pas een klant aan</h1>
<form name="update" method="post" action="<?=URL?>customer/update">
	<input type="hidden" name="id" value="<?=$customer['id'] ?>"/>
	<div class="form-group">
		<label for='name'>Naam</label>
		<input type="text" class='form-control' name="name" value="<?=$customer['name']?>"required>
	</div>

	<div class="form-group">
		<label for='address'>Adres</label>
		<input type="text" class='form-control' name="address" value="<?=$customer['address']?>"required>
	</div>

	<div class="form-group">
		<label for='postalcode'>Postcode</label>
		<input type="text" class='form-control' name="postalcode" value="<?=$customer['postalcode']?>"required>
	</div>

	<div class="form-group">
		<label for='city'>Stad</label>
		<input type="text" class='form-control' name="city" value="<?=$customer['city']?>"required>
	</div>

	<div class="form-group">
		<label for='phone'>Telefoonnummer</label>
		<input type="number" class='form-control' name="phone" value="<?=$customer['phone']?>"required>
	</div>

	<div class="form-group">
		<label for='email'>E-Mail</label>
		<input type="email" class='form-control' name="email" value="<?=$customer['email']?>"required>
	</div>

	<button type="submit" class="btn btn-primary">Aanpassen</button>
</div>
</form>