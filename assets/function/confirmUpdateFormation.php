<?php
require_once "../src/Formation.php";

$form = Formation::getFormationById($_POST["id"]);

// check all input to be set
if(!isset($_POST["formation_name"]))
{
    $_POST["formation_name"] = $form->getNom();
}
if(!isset($_POST["bac"])or $_POST["bac"]== 0)
{
    $_POST["bac"] = $form->getBac();
}

if(isset($_POST["alternance"]))
{
    $_POST["alternance"]=1;
}

if(isset($_POST["formations_continue"]))
{
    $_POST["formations_continue"]=1;
}

if(!(isset($_POST["alternance"])or isset($_POST["formations_continue"])))
{
     $_POST["alternance"]=$form->getAlternance();
     $_POST["formations_continue"]= $form->getFormationsContinue();
}

if(!isset($_POST["certif"]))
{
    $_POST["certif"]= $form->getCertif();
}
if(!isset($_POST["activite_type"]))
{
    $_POST["activite_type"] = $form->getActiviteType();
}
if(!isset($_POST["prerequis"]))
{
    $_POST["prerequis"]= $form->getPrerequis();
}
if(!isset($_POST["metiers"]))
{
    $_POST["metiers"] = $form->getMetiers();
}
if(!isset($_POST["frais"]))
{
    $_POST["frais"] = $form->getFrais();
}
if(!isset($_POST["lieu"]))
{
    $_POST["lieu"] = $form->getLieu();
}

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

$_POST["duree"] = $form->getDuree();

Formation::updateFormation($_POST);
header("Location: ../../dashboard.php");

