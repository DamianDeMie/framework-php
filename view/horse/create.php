<div class="container">
<h1>Voeg een paard toe</h1>
<form name="create" method="post" action="store">
	<div class="form-group">
		<label for='name'>Naam</label>
		<input type="text" class='form-control' name="name" required>
	</div>

	<div class="form-group">
		<label for='race_id'>Ras</label>
		<select class="form-control" name='race_id'>
			<?php foreach (getAllRaces() as $race) {?>
			<option value = '<?php echo $race['id'];?>'><?php echo $race['name']; ?></option>
		<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label for='age'>Leeftijd</label>
		<input type="number" class='form-control' name="age" required>
	</div>

	<button type="submit" class="btn btn-primary">Toevoegen</button>
</div>
</form>