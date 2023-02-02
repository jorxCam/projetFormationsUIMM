<?php

require_once "autoload.php";

$page = New WebPage("Dashboard");

$navbar = New Navbar();
$page->appendContent($navbar);

$page->appendCssUrl("assets/css/style.css");
$page->appendCssUrl("assets/css/footer.css");
$page->appendCssUrl("assets/css/navbar.css");
$page->appendCssUrl("assets/css/dashboard.css");

$formation = Formation::getFormationById($_POST['formation']);



$page->appendContent(<<<HTML

<div>
  <!-- Modal Content -->
  <form action="assets/function/confirmUpdateFormation.php" method="post">
    <div class="container">
    <br>
      <label for="formation_name"><b>Nom de la formation</b></label>
      <input type="text" placeholder="Entrez le nom de la formation" name="formation_name" value="{$formation->getNom()}"><br>

      <label for="lvlAfterBac"><b>Niveau après le bac de la formation</b></label>
      <select id="lvlAfterBac" name="bac">
      <option value="0">Ne pas Changer</option>
        <option value="3">Niveau CAP (RNCP 3)</option> 
        <option value="4">Niveau Bac (RCNP 4)</option>
        <option value="5">Niveau Bac +2 (RNCP 5)</option> 
        <option value="6">Niveau Bac +3 (RNCP 6)</option> 
        <option value="7">Niveau Bac +5 (RNCP 7)</option> 
      </select><br>
      
      <label for="duree"><b>Durée de la formation</b></label>
      <input type="number" placeholder="Temps de la formation totale en h" name="duree" <br>
      
      <label for="duree_entreprise">dont en entreprise</label>
      <input type="number" placeholder="Temps passé en entreprise" name="duree_entreprise"><br>
      
      <label for="alternance"><b>Cursus en Alternance</b></label>
      <input type="checkbox" name="alternance"><br>
      
      <label for="formations_continue"><b>Cursus en Formation Continue</b></label>
      <input type="checkbox" name="formations_continue"><br>
      
      <label for="certif">Certif</label>
      <input type="text" placeholder="certification" name="certif" value="{$formation->getCertif()}"> <br>
      
      <label for="activite_type">Activité Type</label>
      <input type="text" placeholder="activité type de la formation" name="activite_type" value="{$formation->getActiviteType()}" ><br>
      
      <label for="prerequis">Prérequis de la formation</label>
      <input type="text" placeholder="Bac+2 informatique, très fort interet pour l'informatique..." name="prerequis" value="{$formation->getPrerequis()}" ><br>
      
      <label for="metiers">Débouchés possibles</label>
      <input type="text" placeholder="Admin réseau, développeur mobile ..." name="metiers" value="{$formation->getMetiers()}" ><br>
      
      <label for="frais">Couts de la Formation</label>
      <input type="text" placeholder="Pris en charge par la région, Pris en charge par l'entreprise..." name="frais" value="{$formation->getFrais()}" ><br>
      
      <label for="lieu">Lieu de la formation</label>
      <input type="text" placeholder="Pole Formation UIMM Charleville-Mezieres..." name="lieu" value="{$formation->getLieu()}" ><br>
      
      <input type="hidden" value="{$formation->getId()}" name="id">

      <button type="submit">Modifier</button>
    </div>
  </form>
</div>


HTML

);


$footer = New Footer();
$page->appendContent($footer);

echo $page->toHTML();