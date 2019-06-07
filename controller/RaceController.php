<?php

require(ROOT . "model/RaceModel.php");

function index()
{
	render("race/index", array('races' => getAllRaces()));
}

function create(){
	render("race/create");
}

function store(){
    //1. Maak een nieuwe medewerker aan met de data uit het formulier en sla deze op in de database
    createRace($_POST['name'], $_POST['height']);
    //2. Bouw een url op en redirect hierheen
    header("location:index");
}

function edit($id){
    //1. Haal een medewerker op met een specifiek id en sla deze op in een variable
    $raceID = $id;
    $race = getRace($raceID);
    //2. Geef een view weer voor het updaten en geef de variable met medewerker hieraan mee
    render('race/update', array('race' => $race));
}

function update(){
    //1. Update een bestaand persoon met de data uit het formulier en sla deze op in de database
    updateRace($_POST['name'], $_POST['height']);
    //2. Bouw een url en redirect hierheen
    header("location:index");

}

function delete($id){
    //1. Haal een medewerker op met een specifiek id en sla deze op in een variable
    $raceID = $id;
    $race = getRace($raceID);
    //2. Geef een view weer voor het updaten en geef de variable met medewerker hieraan mee
    render('race/delete', array('race' => $race));

}

function destroy($id){
    //1. Delete een medewerker uit de database
    deleteRace($race);
	//2. Bouw een url en redirect hierheen
    header("location:../index");
    
}
?>