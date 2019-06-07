<h1 class="text-center">Rassen</h1>

<table class="table">
    <thead>
        <tr>
            <th>Naam</th>
            <th>Hoogte (in cm)</th>
            <th>Wijzigen</th>
            <th>Verwijderen</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($races as $race) { ?>
        <tr>
            <td><?= $race['name'] ?></td>
            <td><?= $race['height'] ?></td>
            <td><a class = "btn btn-info" href="<?=URL?>race/edit/<?php echo $race['id']?>"><i class="fas fa-edit"></i></a>
            <td><a class = "btn btn-danger" href="<?=URL?>race/delete/<?php echo $race['id']?>"><i class="fas fa-trash"></i></a>
        </tr>
        <?php } ?>
    </tbody>
</table>

<p class="lead text-center"><a href="<?= URL ?>race/create">+ Ras toevoegen</a></p>