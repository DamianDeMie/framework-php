<?php

require(ROOT . "model/ReservationModel.php");

require(ROOT . "model/HorseModel.php");

require(ROOT . "model/CustomerModel.php");

function index()
{
    //1. Index wordt geladen en een array wordt aangemaakt.
	render("reservation/index", array('reservations' => getAllReservations()));
}

function create(){
    //1. Laat de "create" formulier zien.
	render("reservation/create", array('customers' => getAllCustomers(), 'horses' => getAllHorses()) );
}

function store(){
    //1. Maak een nieuwe reservering aan met de data uit het formulier en sla deze op in de database, ook wordt gecontroleerd of deze reservering al bestaat.
     if( isValidReservation($_POST['horse_id'], $_POST['rides'], $_POST['start_time'])){
        createReservation($_POST['customer_id'], $_POST['horse_id'], $_POST['start_time'], $_POST['rides']);
        //2. Bouw een url op en redirect hierheen
        header("location:index");
    } else {
        $data = array(
        "id" => $id,
        "customer_id" => !isset($_POST["customer_id"]) ? "" :$_POST["customer_id"],
        "horse_id"  => !isset ($_POST["horse_id"]) ? "" :$_POST["horse_id"],
        "start_time" => !isset ($_POST["start_time"]) ? "" :$_POST['start_time'],
        "rides" => !isset ($_POST["rides"]) ? "" :$_POST['rides']
        );
        render("reservation/create", array("reservation" => $data,
        "error" => "Er is een dubbele reservering, probeer een andere tijd/paard.", 
        'customers' => getAllCustomers(),
        'horses' => getAllHorses()));
    }

}

function edit($id){
    //1. Haal een reservering op met een specifiek id en sla deze op in een variable
    $reservationID = $id;
    $reservation = getReservation($reservationID);
    //2. Geef een view weer voor het updaten en geef de variable met reservering hieraan mee
    render('reservation/update', array('reservation' => $reservation, 'customers' => getAllCustomers(), 'horses' => getAllHorses()) );
}

function update($id){
    //1. Update een bestaande reservering met de data uit het formulier en sla deze op in de database, ook wordt gecontroleerd of deze reservering al bestaat.
   if( isValidReservation($_POST['horse_id'], $_POST['rides'], $_POST['start_time'])){
    updateReservation($_POST['customer_id'], $_POST['horse_id'], $_POST['start_time'], $_POST['rides'], $id);
    //2. Bouw een url en redirect hierheen
    header("location:" .  URL ."reservation/index");
} else {
    $data = array(
        "id" => $id,
        "customer_id" => $_POST["customer_id"],
        "horse_id"  => $_POST["horse_id"],
        "start_time" => $_POST['start_time'],
        "rides" => $_POST['rides']

    );
    render("reservation/update", array(
        "reservation" => $data,
        "error" => "Er is een dubbele reservering, probeer een andere tijd/paard.", 
        'customers' => getAllCustomers(),
        'horses' => getAllHorses()));
}


}

function delete($id){
    //1. Haal een reservering op met een specifiek id en sla deze op in een variable
    $reservationID = $id;
    $reservation = getReservation($reservationID);
    //2. Geef een view weer voor het updaten en geef de variable met reservering hieraan mee
    render('reservation/delete', array('reservation' => $reservation));

}

function destroy($id){
    //1. Delete een reservering uit de database
    deleteReservation($reservation);
	//2. Bouw een url en redirect hierheen
    header("location:../index");
    
}
?>