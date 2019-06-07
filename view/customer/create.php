<div class="container">
<h1>Voeg een klant toe</h1>
<form name="create" method="post" action="store">
	<input type="hidden" name="id" value="<?=$customer['id'] ?>"/>
	<div class="form-group">
		<label for='name'>Naam</label>
		<input type="text" class='form-control' name="name" required>
	</div>

	<div class="form-group">
		<label for='address'>Adres</label>
		<input type="text" class='form-control' name="address" required>
	</div>

	<div class="form-group">
		<label for='postalcode'>Postcode</label>
		<input type="text" class='form-control' name="postalcode" required>
	</div>

	<div class="form-group">
		<label for='city'>Stad</label>
		<input type="text" class='form-control' name="city" required>
	</div>

	<div class="form-group">
		<label for='phone'>Telefoonnummer</label>
		<input type="number" class='form-control' name="phone" required>
	</div>

	<div class="form-group">
		<label for='email'>E-Mail</label>
		<input type="email" class='form-control' name="email" required>
	</div>

	<button type="submit" class="btn btn-primary">Toevoegen</button>
</div>
</form>