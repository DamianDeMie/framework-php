

<div class="container">
<h1>Voeg een reservering toe</h1>
<form name="create" method="post" action="store">
	<h2 style="color: red"><?php
		echo($error)
		?>
	</h2>
	<div class="form-group">
		<label for='customer_id'>Klant</label>
			<select class="form-control" name='customer_id'>
			<?php foreach ($customers as $customer) {?>
			<option value = '<?php echo $customer['id'];?>' <?php if($customer['id'] === $reservation['customer_id']){ echo "selected";} ?>><?php echo $customer["name"] ; ?></option>
		<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label for='horse_id'>Paard</label>
		<select class="form-control" name='horse_id'>
			<?php foreach ($horses as $horse) {?>
			<option value = '<?php echo $horse['id'];?>' <?php if($horse['id'] === $reservation['horse_id']){ echo "selected";} ?>><?php echo $horse["name"] ; ?></option>
		<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label for='start_time'>Starttijd</label>
		<input type="datetime-local" class='form-control' name="start_time" value="<?php echo  $reservation['start_time']?>" required>
	</div>

	<div class="form-group">
		<label for='rides'>Ritten (Prijs is &euro;60 per rit)</label>
		<input type="number" class='form-control' name="rides" value="<?php echo $reservation['rides']?>">
	</div>

	<button type="submit" class="btn btn-primary">Toevoegen</button>
</div>
</form>