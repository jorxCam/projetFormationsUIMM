<?php



require_once "autoload.php";

$page = New WebPage("Acceuil");

// Ajout de la Navbar
$navbar = New Navbar();
$navbar->addButton("Acceuil","index.php");
$navbar->addButton("Dashboard","dashboard.php");

$page->appendContent($navbar);
$page->appendCssUrl("assets/css/navbar.css");

// Ajout du corps de la page Acceuil

$page->appendCssUrl("assets/css/style.css");
$page->appendContent(<<<HTML
<div class="slides-formations">

    <div class="slide-formation"><img id="slide_logo" src="assets/img/uimm.jpg">
    </br></br><q>UIMM Formation d'avenir</q>
    
    <p class="author">- Continue / Alternance</p>
    </div>
    
    <div class="slide-formation"><img id="slide_logo2" src="assets/img/Format-Linkedin-JPO-1080x1080-1-1024x1024.jpg">
    </br></br><q>Portes ouvertes Chalon / Saône</q>
    <p class="author">-  Samedi 28 janvier</p>
    </div>
    
    <div class="slide-formation"><img id="slide_logo3" src="assets/img/ImageVoeux2023.jpg">
    </br></br><q>UIMM vous présente ses meillieurs voeux </q>
    <p class="author">- Pour l'annee 2023</p>
    </div>
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<div class="conteneur-point">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>
HTML);

include 'assets/includes/connectionbdd.php';

@$keywords = strip_tags($_GET["keywords"]);
@$valider = stripslashes($_GET["valider"]);

//  ici verifier si c vide et si cest plein et on prepare la requete on veut retrouver (domaine ,nom ,metier)
if ((isset($valider)) && !empty(trim($keywords))) {

    // ici je securise les requet et la barre de recherche
    foreach($_GET as $key => $value){
        if(ini_get($keywords))$value=stripslashes($value);
        $value=htmlentities($value,ENT_QUOTES);
        $_GET[$key]=$value;
        ${$key}=$value;
    }
        // eclater ma chaine ds lespace et on demunuit des espace de debut et de fin 
    $words = explode(" ", trim($keywords));

    for ($i = 0; $i < count($words); $i++)
        $kw[$i] = "activite_type like '%" . $words[$i] . "%' or nom  like '%" . $words[$i] . "%' or metiers like '%" . $words[$i] . "%'";

        //implode sevira a transformer un tableau en chaine de caractere on utilise or(ou) pour separer chaque mots et on aurai pu utiliser and (et) pour avoir des mots dans la meme phrase ! 
            $res = $bdd->prepare("SELECT * FROM formation WHERE " . implode(" or ", $kw));
            $res->setFetchMode(PDO::FETCH_ASSOC);
            $res->execute();
            $tab = $res->fetchAll();
            

            $afficher = "oui";
}
$page->appendContent(<<<HTML

     <!-- ici je mets en get pour afficher mes recherche dans l'url  -->
    
    <form name="fo" method="get" action="index.php#fo">
        <input type="text" name="keywords" value= {$keywords} >
        <input type="submit" name="valider" value="Rechercher" />
    </form>
    <!-- ici si afficher affiche oui als il maffiche -->
HTML
);

     if (@$afficher == "oui") { 
        $num = count($tab);
        $page->appendContent(<<<HTML
        <div id="resultats">


<div id="nbr"> {$num} 
HTML
);
$carac = "résultat trouvé";
if (count($tab)>1)
{
    $carac =  "résultats trouvés";
}
$page->appendContent(<<<HTML
{$carac} </div>

<ol>
HTML
);

        for ($i = 0; $i < count($tab);$i++ ) {
            $page->appendContent(<<<HTML
<a href="page_formation.php?q={$tab[$i]["id"]}"><li> {$tab[$i]["nom"]}</li>
                    {$tab[$i]["activite_type"] }</br></br></li>
                    {$tab[$i]["metiers"]}</li></a>
HTML
        );      
        }
        $page->appendContent(<<<HTML
            </ol>
        </div>
        <div id="fo"></div>
HTML
                );
            }


//Ajout du Footer de la page

$footer = New Footer();
$page->appendContent($footer);
$page->appendCssUrl("assets/css/footer.css");

//Ajout des scripts Javascripts pour le bon fonctionnement de la page
$page->appendContent(<<<HTML
<script type="text/javascript" src="assets/js/script.js"></script>
HTML
);
echo $page->toHTML();
