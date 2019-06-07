<?php

require(ROOT . "model/CustomerModel.php");

function index()
{
	render("customer/index", array('customers' => getAllCustomers()));
}

function create(){
	render("customer/create");
}

function store(){
    //1. Maak een nieuwe klant aan met de data uit het formulier en sla deze op in de database
    createCustomer($_POST['name'], $_POST['address'], $_POST['postalcode'], $_POST['city'], $_POST['phone'], $_POST['email']);
    //2. Bouw een url op en redirect hierheen
    header("location:index");

}

function edit($id){
    //1. Haal een klant op met een specifiek id en sla deze op in een variable
    $customerID = $id;
    $customer = getCustomer($customerID);
    //2. Geef een view weer voor het updaten en geef de variable met klant hieraan mee
    render('customer/update', array('customer' => $customer));
}

function update(){
    //1. Update een bestaand persoon met de data uit het formulier en sla deze op in de database
    updateCustomer($_POST['name'], $_POST['address'], $_POST['postalcode'], $_POST['city'], $_POST['phone'], $_POST['email']);
    //2. Bouw een url en redirect hierheen
    header("location:index");

}

function delete($id){
    //1. Haal een klant op met een specifiek id en sla deze op in een variable
    $customerID = $id;
    $customer = getCustomer($customerID);
    //2. Geef een view weer voor het verwijderen en geef de variable met klant hieraan mee
    render('customer/delete', array('customer' => $customer));

}

function destroy($id){
    //1. Delete een klant uit de database
    deleteCustomer($customer);
	//2. Bouw een url en redirect hierheen
    header("location:../index");
    
}
?>