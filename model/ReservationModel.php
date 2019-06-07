<?php

function getAllReservations() {
    
  // Met het try statement kunnen we code proberen uit te voeren. Wanneer deze
  // mislukt kunnen we de foutmelding afvangen en eventueel de gebruiker een
  // nette foutmelding laten zien. In het catch statement wordt de fout afgevangen
   try {
       // Open de verbinding met de database
       $conn=openDatabaseConnection();
   
       // Zet de query klaar door middel van de prepare method
       $stmt = $conn->prepare("SELECT *, DATE_ADD(start_time, INTERVAL rides HOUR) as end_time FROM `reservations`");

       // Voer de query uit
       $stmt->execute();

       // Haal alle resultaten op en maak deze op in een array
       // In dit geval is het mogelijk dat we meedere medewerkers ophalen, daarom gebruiken we
       // hier de fetchAll functie.
       $result = $stmt->fetchAll();

   }
   // Vang de foutmelding af
   catch(PDOException $e){
       // Zet de foutmelding op het scherm
       echo "Connection failed: " . $e->getMessage();
   }

   // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
   // van de server opgeschoond blijft
   $conn = null;

   // Geef het resultaat terug aan de controller
   return $result;
}

function getReservation($id){
    try {
        // Open de verbinding met de database
        $conn=openDatabaseConnection();
 
        // Zet de query klaar door midel van de prepare method. Voeg hierbij een
        // WHERE clause toe (WHERE id = :id. Deze vullen we later in de code
        $stmt = $conn->prepare("SELECT id, customer_id, horse_id, DATE_FORMAT(start_time,'%Y-%m-%dT%H:%i') as start_time, rides FROM `reservations` WHERE id = :id");
        // Met bindParam kunnen we een parameter binden. Dit vult de waarde op de plaats in
        // We vervangen :id in de query voor het id wat de functie binnen is gekomen.
        $stmt->bindParam(":id", $id);

        // Voer de query uit
        $stmt->execute();

        // Haal alle resultaten op en maak deze op in een array
        // In dit geval weten we zeker dat we maar 1 medewerker op halen (de where clause), 
        //daarom gebruiken we hier de fetch functie.
        $result = $stmt->fetch();
 
    }
    catch(PDOException $e){

        echo "Connection failed: " . $e->getMessage();
    }
    // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
    // van de server opgeschoond blijft
    $conn = null;
 
    // Geef het resultaat terug aan de controller
    return $result;
 }

 function createReservation($customer_id, $horse_id, $start_time, $rides) {
 	try {
       // Open de verbinding met de database
       $conn=openDatabaseConnection();

       $sql = "INSERT INTO `reservations` (customer_id, horse_id, start_time, rides) VALUES (:customer_id, :horse_id, :start_time, :rides)";
       $query = $conn->prepare($sql);

        $query->bindParam("customer_id", $_POST['customer_id']);
        $query->bindParam("horse_id", $_POST['horse_id']);
        $query->bindParam("start_time", $_POST['start_time']);
        $query->bindParam("rides", $_POST['rides']);
        $query->execute();
      }
   // Vang de foutmelding af
   catch(PDOException $e){
       // Zet de foutmelding op het scherm
       echo "Connection failed: " . $e->getMessage();
   }
}

 function updateReservation($customer_id, $horse_id, $start_time, $rides, $id){
    // Maak hier de code om een medewerker te bewerken
  try {
       // Open de verbinding met de database
       $conn=openDatabaseConnection();


       $sql = 'SELECT * from `reservations` WHERE id = :id';
       $query = $conn->prepare($sql);
       $query->bindParam(":id", $id);
       $query->execute();

       $result = $query->fetch();

       $sql = "UPDATE `reservations` SET customer_id = :customer_id, horse_id = :horse_id, start_time = :start_time, rides = :rides where id = :id";
       $query = $conn->prepare($sql);

        $query->bindParam("customer_id", $_POST['customer_id']);
        $query->bindParam("horse_id", $_POST['horse_id']);
        $query->bindParam("start_time", $_POST['start_time']);
        $query->bindParam("rides", $_POST['rides']);
        $query->bindParam(":id", $id);
        $query->execute();
      }
   // Vang de foutmelding af
   catch(PDOException $e){
       // Zet de foutmelding op het scherm
       echo "Connection failed: " . $e->getMessage();
   }
}
function deleteReservation($reservation){
    try {
       // Open de verbinding met de database
       $conn=openDatabaseConnection();

       $id = $_POST['id'];

       $sql = 'DELETE FROM `reservations` WHERE id = :id';
       $query = $conn->prepare($sql);
       $query->bindParam(":id", $id);
       $query->execute();
      }
   // Vang de foutmelding af
   catch(PDOException $e){
       // Zet de foutmelding op het scherm
       echo "Connection failed: " . $e->getMessage();
   }
 }

function isValidReservation($horse, $rides, $start_time){
  $conn=openDatabaseConnection();

  $sql = "SELECT *, DATE_ADD(start_time, INTERVAL rides HOUR) as end_time from `reservations` WHERE (
    (
      start_time <= :start_time  AND  DATE_ADD(start_time, INTERVAL rides HOUR) >= :start_time
    ) OR (
      start_time <= DATE_ADD(:start_time, INTERVAL :rides HOUR) AND  DATE_ADD(start_time, INTERVAL rides HOUR)>=DATE_ADD(:start_time, INTERVAL :rides HOUR)
    )) AND horse_id = :horse ";
    $query = $conn->prepare($sql);
    $query->bindParam(":start_time", $start_time);
    $query->bindParam(":rides", $rides);
    $query->bindParam(":horse", $horse);

    $query->execute();
    $result = $query->fetchAll();
    if(count($result) > 0 )  {
      return false;
    } else {
      return true;
    }
}

