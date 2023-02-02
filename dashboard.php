<?php
require_once "autoload.php";



$page = new WebPage("dashboard");

$navbar= new Navbar();
$navbar->addButton("Acceuil","index.php");
$page->appendContent($navbar);

$page->appendCssUrl("assets/css/dashboard.css");
$page->appendCssUrl("assets/css/navbar.css");
$page->appendCssUrl("assets/css/footer.css");
$page->appendCssUrl("assets/css/style.css");


$page->appendContent(<<<HTML
<div class="dashboard">
    <h1>Tableau Administrateur</h1>
    <div class="liste_formation">
<ul>
HTML);

$results = Formation::getAllFormations();


foreach ($results as $formation)
{
    $page->appendContent(<<<HTML
     <li> 
     <div>
        <a href="page_formation?q={$formation->getId()}">
            {$formation->getNom()}
        </a>
     </div>
     <div>
        <button id="{$formation->getId()}" class="ButtonArchive">Archiver</button>
        
        <button id="up{$formation->getId()}" class="ButtonUpdate" type="submit" form="formUp{$formation->getId()}">Modifier</button>
        
        <form id="formUp{$formation->getId()}" method="post" action="modifyFormation.php" style="display:none">
        <input type="hidden" name="formation" value="{$formation->getId()}">
        </form>
        </div>
     </li>
HTML);
}


$page->appendContent(<<<HTML
</ul>
    </div>
    <button class='creat_formation' onclick="document.getElementById('id01').style.display='block'">Créer la formation</button>

<!-- The Modal -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'"
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" action="assets/function/confirmCreateFormation.php" method="post">
    <div class="container">
    <br>
      <label for="formation_name"><b>Nom de la formation</b></label>
      <input type="text" placeholder="Entrez le nom de la formation" name="formation_name" required><br>

      <label for="lvlAfterBac"><b>Niveau après le bac de la formation</b></label>
      <select id="lvlAfterBac" name="bac" required>
        <option value="3">Niveau CAP (RNCP 3)</option> 
        <option value="4">Niveau Bac (RCNP 4)</option>
        <option value="5">Niveau Bac +2 (RNCP 5)</option> 
        <option value="6">Niveau Bac +3 (RNCP 6)</option> 
        <option value="7">Niveau Bac +5 (RNCP 7)</option> 
      </select><br>
      
      <label for="duree"><b>Durée de la formation</b></label>
      <input type="number" placeholder="Temps de la formation totale en h" name="duree" required><br>
      
      <label for="duree_entreprise">dont en entreprise</label>
      <input type="number" placeholder="Temps passé en entreprise" name="duree_entreprise" required><br>
      
      <label for="alternance"><b>Cursus en Alternance</b></label>
      <input type="checkbox" name="alternance"><br>
      
      <label for="formations_continue"><b>Cursus en Formation Continue</b></label>
      <input type="checkbox" name="formations_continue"><br>
      
      <label for="certif">Certif</label>
      <input type="text" placeholder="certification" name="certif" required><br>
      
      <label for="activite_type">Activité Type</label>
      <input type="text" placeholder="activité type de la formation" name="activite_type" required><br>
      
      <label for="prerequis">Prérequis de la formation</label>
      <input type="text" placeholder="Bac+2 informatique, très fort interet pour l'informatique..." name="prerequis" required><br>
      
      <label for="metiers">Débouchés possibles</label>
      <input type="text" placeholder="Admin réseau, développeur mobile ..." name="metiers" required><br>
      
      <label for="frais">Couts de la Formation</label>
      <input type="text" placeholder="Pris en charge par la région, Pris en charge par l'entreprise..." name="frais" required><br>
      
      <label for="lieu">Lieu de la formation</label>
      <input type="text" placeholder="Pole Formation UIMM Charleville-Mezieres..." name="lieu" required><br>
      

      <button type="submit">Créer</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<div id="id02" class="modal">
<span class="close" title="Close Modal">&times;</span>
    <form id="formDelete" class="modal-content animate" action="assets/function/confirmDeleteFormation.php" method="post">
        <div class="container">
            <br>
            <button type="submit">Mettre en archive</button>
        </div>
    </form>

</div>


</div>
HTML);

$footer = New Footer();
$page->appendContent($footer);

$page->appendContent(<<<HTML
<script type="text/javascript" src="assets/js/script.js"></script>
HTML
);
echo $page->toHTML();