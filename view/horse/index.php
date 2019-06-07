<h1 class="text-center">Paarden</h1>

<table class="table">
    <thead>
        <tr>
            <th>Naam</th>
            <th>Ras</th>
            <th>Leeftijd</th>
            <th>Wijzigen</th>
            <th>Verwijderen</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($horses as $horse) { ?>
        <tr>
            <td><?= $horse['name'] ?></td>
            <td><?= getRace($horse['race_id'])['name']?></td>
            <td><?= $horse['age'] ?></td>
            <td><a class = "btn btn-info" href="<?=URL?>horse/edit/<?php echo $horse['id']?>"><i class="fas fa-edit"></i></a>
            <td><a class = "btn btn-danger" href="<?=URL?>horse/delete/<?php echo $horse['id']?>"><i class="fas fa-trash"></i></a>
        </tr>
        <?php } ?>
    </tbody>
</table>

<p class="lead text-center"><a href="<?= URL ?>horse/create">+ Paard toevoegen</a></p>