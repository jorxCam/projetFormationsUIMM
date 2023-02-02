<?php
require_once "../src/Formation.php";

// check all input to be set
if(!isset($_POST["formation_name"]))
{
    throw New Exception("Nom de formation non renseigné");
}
if(!isset($_POST["bac"]))
{
    throw New Exception("Niveau de la formation non renseigné");
}
if(!isset($_POST["duree"]))
{
    throw New Exception("Durée totale de la formation non renseigné");
}
if(!isset($_POST["duree_entreprise"]))
{
    throw New Exception("Durée de la formation en entreprise non renseigné");
}
if(!(isset($_POST["alternance"])or isset($_POST["formations_continue"])))
{
    throw New Exception("Choisissez au moins un type de formation");
}
if(!isset($_POST["certif"]))
{
    throw New Exception("Certification non renseigné");
}
if(!isset($_POST["activite_type"]))
{
    throw New Exception("Activité type non renseigné");
}
if(!isset($_POST["prerequis"]))
{
    throw New Exception("Prerequis à l'entrée en formation non renseigné");
}
if(!isset($_POST["metiers"]))
{
    throw New Exception("Metiers futurs non renseigné");
}
if(!isset($_POST["frais"]))
{
    throw New Exception("Frais de la formation non renseigné");
}
if(!isset($_POST["lieu"]))
{
    throw New Exception("Lieu de la formation non renseigné");
}
// start conversion to enter in database

if(isset($_POST["alternance"]))
{
    $_POST["alternance"]=1;
}
else{$_POST["alternance"]=0;}

if(isset($_POST["formations_continue"]))
{
    $_POST["formations_continue"]=1;
}
else{$_POST["formations_continue"]=0;}

$_POST["duree"]= $_POST["duree"]."h dont ".$_POST["duree_entreprise"]."h en entreprise";
unset($_POST["duree_entreprise"]);

switch ($_POST["bac"]){
    case 3:
        $_POST["bac"]= 1;
        $_POST["niveau"]=3;
        break;
    case 4:
        $_POST["bac"]= 2;
        $_POST["niveau"]=4;
        break;
    case 5:
        $_POST["bac"]= 2;
        $_POST["niveau"]=5;
        break;
    case 6:
        $_POST["bac"]= 3;
        $_POST["niveau"]=6;
        break;
    case 7:
        $_POST["bac"]= 5;
        $_POST["niveau"]=7;
        break;
}

Formation::createNewFormation($_POST);
header("Location: ../../dashboard.php");
