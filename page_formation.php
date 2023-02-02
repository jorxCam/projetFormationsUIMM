<?php 
require_once "autoload.php";

$page = New WebPage("Acceuil");

//Recuperer une formation
$formation = Formation::getFormationById($_GET["q"]);
$nom = $formation->getNom();
$bac = $formation->getBac();
$duree = $formation->getDuree();
$certif = $formation->getCertif();
$acttype = $formation->getActiviteType();
$metiers = $formation->getMetiers();
$prerequis = $formation->getPrerequis();
$frais = $formation->getFrais();
$lieu = $formation->getLieu();
$alternance = $formation->getAlternance();
$formationsContinue = $formation->getFormationsContinue();
$typeFormationText="";



$acttype = preg_replace("'\r\n'","<br>",$acttype);
$metiers = preg_replace("'\r\n'","<br>",$metiers);
$prerequis = preg_replace("'\r\n'","<br>",$prerequis);
$frais = preg_replace("'\r\n'","<br>",$frais);

// Ajout de la Navbar
$navbar = New Navbar();
$navbar->addButton("Acceuil","index.php");
$navbar->addButton("Dashboard","dashboard.php");
$page->appendContent($navbar);
$page->appendCssUrl("assets/css/navbar.css");

if ($alternance == 1){
 $typeFormationText="Formation en ALTERNANCE <br>  Statut : Contrat d’apprentissage ou contrat de professionnalisation ";
}
if ($formationsContinue==1){
 $typeFormationText=$typeFormationText."<br>Formation initiale dans le cadre du Plan Régional de Formation <br>  Statut de stagiaire de la formation professionnelle";
}
/*
alternance
Formation en ALTERNANCE
Statut : Contrat d’apprentissage ou contrat de professionnalisation

formations_continue
Formation initiale dans le cadre du Plan Régional de Formation
Statut de stagiaire de la formation professionnelle
*/

// Ajout du corps de la page Acceuil

$page->appendCssUrl("assets/css/style.css");
$page->appendContent(<<<HTML

    
    <h1 style="color:black;font-size:120%;font-family:times;text-align:left;">POUR OBTENIR LA CERTIFICATION</h1>
    <h1 style="color:#006483;font-size:180%;font-family:times;text-align:left;">{$nom}</h1>
    
    <h1 style="color:#006483;font-size:120%;font-family:times;text-align:left;"><b>Niveau BAC + {$bac}</b></h1>
    
    <h1 style="color:#006483;font-size:120%;font-family:times;text-align:left;"> {$typeFormationText}</h1>


    <!-- activites type -->
    <style>
    table, th, td {
    /* border:1px solid black;  */
    }
    </style>
    <table style="width:100%;">
  <tr>
    <!--  -->
    <td style="width:80%;">
    <h1 style="color:black;font-size:90%;font-family:times;text-align:left;">{$acttype}</h1>
    </td>


    <td style="width:100%;align:right;">
    <table style="width:40%;height:250%;border: 1px solid white;border-collapse: collapse;background-color: #005b7d;">
  <tr>
    <td>
        <h1 style="color:white;font-size:80%;font-family:times;text-align:center;">Durée de la formation
</h1>
    </td>
  </tr>
  <tr style="width:40%;height:250%;border-collapse: collapse;background-color: #ff0000;color:white;font-size:80%;font-family:times;">
    <td>
        <h1 style="color:white;font-size:80%;font-family:times;">{$duree}</h1>
    </td>
  </tr>
</table>
<p>
<table style="width:40%;height:250%;border: 1px solid white;border-collapse: collapse;background-color: #005b7d;">
  <tr>
    <td>
        <h1 style="color:white;font-size:80%;font-family:times;text-align:center;">Certification
</h1>
    </td>
  </tr>
  <tr style="width:40%;height:250%;border-collapse: collapse;background-color: #ff0000;color:white;font-size:80%;font-family:times;">
    <td>
        <h1 style="color:white;font-size:80%;font-family:times;">{$certif}</h1>
    </td>
  </tr>
</table>

    </td>
  </tr>

</table>

<h1 style="color:#006483;font-size:100%;font-family:times;text-align:left;"><b>Conditions d`admission et pré-requis</b></h1>
    <h1 style="color:black;font-size:100%;font-family:times;text-align:left;">{$prerequis}    </h1>
   

<h1 style="color:#006483;font-size:100%;font-family:times;text-align:left;"><b>Métiers visés</b></h1>
    <h1 style="color:black;font-size:100%;font-family:times;text-align:left;">    {$metiers}     </h1>

<h1 style="color:#006483;font-size:100%;font-family:times;text-align:left;"><b>Frais de scolarité</b></h1>
    <h1 style="color:black;font-size:100%;font-family:times;text-align:left;">    {$frais}     </h1>
    
<h1 style="color:#006483;font-size:100%;font-family:times;text-align:left;"><b>Lieu</b></h1>
    <h1 style="color:black;font-size:100%;font-family:times;text-align:left;">  {$lieu}     </h1>

<br/><br/><br/>
HTML);


//Ajout du Footer de la page

$footer = New Footer();
$page->appendContent($footer);
$page->appendCssUrl("assets/css/footer.css");

echo $page->toHTML();