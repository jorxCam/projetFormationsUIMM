<?php include 'assets/includes/connectionbdd.php'; ?>

<?php


@$keywords = htmlspecialchars($_GET["keywords"]);
@$valider = htmlspecialchars($_GET["valider"]);

//  ici verifier si c vide et si cest plein et on prepare la requete on veut retrouver (domaine ,nom ,metier)
if ((isset($valider)) && !empty(trim($keywords))) {
    // eclater ma chaine ds lespace et on demunuit des espace de debut et de fin 
    $words = explode(" ", trim($keywords));

    for ($i = 0; $i < count($words); $i++)
        $kw[$i] = "activite_type like '%" . $words[$i] . "%' or nom  like '%" . $words[$i] . "%' or metiers like '%" . $words[$i] . "%'";

            $res = $bdd->prepare("SELECT * FROM formation WHERE " . implode(" or ", $kw));
            $res->setFetchMode(PDO::FETCH_ASSOC);
            $res->execute();
            $tab = $res->fetchAll();
            

            $afficher = "oui";
}
?>

<!DOCTYPE php>
<html lang="FR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />

    <title>Barre de recherche</title>
</head>

<body>
    <a id="#fo"></a>
    <!-- ici je mets en get pour afficher mes recherche dans l'url -->
    <form name="fo" method="get" action="index.php#fo">
        <input type="text" name="keywords" value="<?php echo $keywords ?>" placeholder="Mots-clés" />
        <input type="submit" name="valider" value="Rechercher" />
    </form>
    <!-- ici si afficher affiche oui als il maffiche -->
    <?php if (@$afficher == "oui") { ?>
        <div id="resultats">

            <!-- ici retourne le resultat au singulier ou au pluriel tout depant du nombre de resultats trouver -->
            <div id="nbr"><?= count($tab) . " " . (count($tab) > 1 ? "résultats trouvés" : "résultat trouvé") ?></div>

            <ol>
                <?php for ($i = 0; $i < count($tab);$i++ ) { ?>
                    <a href="id"><li><?php echo $tab[$i]["nom"] ?></li>
                    <?php echo $tab[$i]["activite_type"] ?></br></br></li>
                    <?php ;echo$tab[$i]["metiers"] ?></li></a>
                
                <?php } ?>
            </ol>
        </div>

    <?php } ?>

</body>





</html>