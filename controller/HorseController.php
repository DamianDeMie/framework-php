<?php

require(ROOT . "model/HorseModel.php");

require(ROOT . "model/RaceModel.php");

function index()
{
	render("horse/index", array('horses' => getAllHorses()));
}

function create(){
	render("horse/create");
}

function store(){
    //1. Maak een nieuwe medewerker aan met de data uit het formulier en sla deze op in de database
    createHorse($_POST['name'], $_POST['race_id'], $_POST['height']);
    //2. Bouw een url op en redirect hierheen
    header("location:index");
}

function edit($id){
    //1. Haal een medewerker op met een specifiek id en sla deze op in een variable
    $horseID = $id;
    $horse = getHorse($horseID);
    //2. Geef een view weer voor het updaten en geef de variable met medewerker hieraan mee
    render('horse/update', array('horse' => $horse));
}

function update(){
    //1. Update een bestaand persoon met de data uit het formulier en sla deze op in de database
    updateHorse($_POST['name'], $_POST['race_id'], $_POST['height']);
    //2. Bouw een url en redirect hierheen
    header("location:index");

}

function delete($id){
    //1. Haal een medewerker op met een specifiek id en sla deze op in een variable
    $horseID = $id;
    $horse = getHorse($horseID);
    //2. Geef een view weer voor het updaten en geef de variable met medewerker hieraan mee
    render('horse/delete', array('horse' => $horse));

}

function destroy($id){
    //1. Delete een medewerker uit de database
    deleteHorse($horse);
	//2. Bouw een url en redirect hierheen
    header("location:../index");
    
}
?>