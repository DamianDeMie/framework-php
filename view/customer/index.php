<h1 class="text-center">Klanten</h1>

<table class="table">
    <thead>
        <tr>
            <th>Naam</th>
            <th>Adres</th>
            <th>Postcode</th>
            <th>Stad</th>
            <th>Telefoon</th>
            <th>Email</th>
            <th>Wijzigen</th>
            <th>Verwijderen</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $customer) { ?>
        <tr>
            <td><?= $customer['name'] ?></td>
            <td><?= $customer['address'] ?></td>
            <td><?= $customer['postalcode'] ?></td>
            <td><?= $customer['city'] ?></td>
            <td><?= $customer['phone'] ?></td>
            <td><?= $customer['email'] ?></td>
            <td><a class = "btn btn-info" href="<?=URL?>customer/edit/<?php echo $customer['id']?>"><i class="fas fa-edit"></i></a>
            <td><a class = "btn btn-danger" href="<?=URL?>customer/delete/<?php echo $customer['id']?>"><i class="fas fa-trash"></i></a>
        </tr>
        <?php } ?>
    </tbody>
</table>

<p class="lead text-center"><a href="<?= URL ?>customer/create">+ Klant toevoegen</a></p>