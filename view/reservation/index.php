

<h1 class="text-center">Reserveringen</h1>

<table class="table">
    <thead>
        <tr>
            <th>Klantennaam</th>
            <th>Gekozen paard</th>
            <th>Starttijd</th>
            <th>Eindtijd</th>
            <th>Prijs</th>
            <th>Wijzigen</th>
            <th>Verwijderen</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservations as $reservation) { ?>
        <tr>
            <td><?= getCustomer($reservation['customer_id'])['name'] ?></td>
            <td><?= getHorse($reservation['horse_id'])['name'] ?></td>
            <td><?= $reservation['start_time'] ?></td>
            <td><?= $reservation['end_time'] ?></td>
            <td>&euro;<?= 65 * $reservation['rides'] ?></td>
            <td><a class = "btn btn-info" href="<?=URL?>reservation/edit/<?php echo $reservation['id']?>"><i class="fas fa-edit"></i></a>
            <td><a class = "btn btn-danger" href="<?=URL?>reservation/delete/<?php echo $reservation['id']?>"><i class="fas fa-trash"></i></a>
        </tr>
        <?php } ?>
    </tbody>
</table>

<p class="lead text-center"><a href="<?= URL ?>reservation/create">+ Reservering toevoegen</a></p>