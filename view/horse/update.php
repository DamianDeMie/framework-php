<div class="container">
<h1>Pas een paard aan</h1>
<form name="update" method="post" action="<?=URL?>horse/update">
	<input type="hidden" name="id" value="<?=$horse['id'] ?>"/>
	<div class="form-group">
		<label for='name'>Naam</label>
		<input type="text" class='form-control' name="name" value="<?=$horse['name']?>" required>
	</div>

	<div class="form-group">
		<label for='race_id'>Ras</label>
		<select class="form-control" name='race_id'>
			<?php foreach (getAllRaces() as $race) {?>
			<option value = '<?php echo $race['id'];?>' <?php if($race['id'] === $horse['race_id']){ echo "selected";} ?>><?php echo $race['name']; ?></option>
		<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label for='age'>Leeftijd</label>
		<input type="number" class='form-control' name="age" value="<?=$horse['age']?>" required>
	</div>

	<button type="submit" class="btn btn-primary">Toevoegen</button>
</div>
</form>