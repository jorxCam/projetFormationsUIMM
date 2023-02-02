<?php

try

{
       $bdd = new PDO('mysql:host=localhost;dbname=formations_recherche', 'root', '');
}
catch(Exception $e)

{
        die('Erreur : '.$e->getMessage());
}      

// On récupère tout le contenu de la table formations_recherche
$reponse = $bdd->query('SELECT * FROM formation');

// On affiche chaque entrée une à une
$res=1;
while ($donnees = $reponse->fetch())
{

?>

    <p>
    Resultat = <?php $res?> <strong>Nom de la Formation </strong> :  
    <?php echo $donnees['nom']; ?><br /> <p>
---------

---------
    <strong> 
    Niveau  </strong> : 
    <?php echo $donnees['niveau']; ?>,<p> 
     
    <strong> 
    bac   </strong> :
    <?php echo $donnees['bac']; ?> !!!! !<br /><p> 
      
    <strong> 
    duration  </strong> :
    <?php echo $donnees['duree']; ?> <p> 
     
    <strong> 
    activites type   </strong> :
    <?php echo $donnees['activitetype']; ?>  !!!!!  <br /><p>
    
    <strong> 
    Frais  </strong> :
    <?php echo $donnees['frais']; ?> <p> 
     
    <strong> 
    lieu  </strong> :
    <?php echo $donnees['lieu']; ?> 
    
    <strong> 
    : <em> </strong> :
    <?php echo $donnees['metiers']; ?></em>

   </p>

<?php

}

$reponse->closeCursor(); // Termine le traitement de la requête

?>