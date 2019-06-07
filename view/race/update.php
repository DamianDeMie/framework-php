<div class="container">
<h1>Pas een ras aan</h1>
<form name="update" method="post" action="<?=URL?>race/update">
	<input type="hidden" name="id" value="<?=$race['id'] ?>"/>
	<div class="form-group">
		<label for='name'>Naam</label>
		<input type="text" class='form-control' name="name" value="<?=$race['name']?>"required>
	</div>

	<div class="form-group">
		<label for='height'>Hoogte (in cm)</label>
		<input type="text" class='form-control' name="height" value="<?=$race['height']?>"required>
	</div>

	<button type="submit" class="btn btn-primary">Aanpassen</button>
</div>
</form>