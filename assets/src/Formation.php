<?php
require_once "MyPDO.php";
class Formation
{
    private $id;
    private $description;
    private $nom;
    private $niveau;
    private $bac;
    private $duree;
    private $alternance;
    private $formations_continue;
    private $certif;
    private $activite_type;
    private $prerequis;
    private $metiers;
    private $frais;
    private $lieu;

    private function __contruct(int $id,string $description,string $nom,int $niveau,int $bac,string $duree,bool $alternance,bool $formations_continue,string $certif,string $activite_type,string $prerequis,string $metiers,string $frais,string $lieu)
    {
        $this->id = $id;
        $this->description = $description;
        $this->nom = $nom;
        $this->niveau = $niveau;
        $this->bac= $bac;
        $this->duree = $duree;
        $this->alternance = $alternance;
        $this->formations_continue = $formations_continue;
        $this->certif = $certif;
        $this->activite_type = $activite_type;
        $this->prerequis = $prerequis;
        $this->metiers = $metiers;
        $this->frais = $frais;
        $this->lieu = $lieu;
    }
    private function __construct(array $infos)
    {
        $this->id = $infos["id"];
        $this->description = $infos["description"];
        $this->nom = $infos["nom"];
        $this->niveau = $infos["niveau"];
        $this->bac= $infos["bac"];
        $this->duree = $infos["duree"];
        $this->alternance = $infos["alternance"];
        $this->formations_continue = $infos["formations_continue"];
        $this->certif = $infos["certif"];
        $this->activite_type = $infos["activite_type"];
        $this->prerequis = $infos["prerequis"];
        $this->metiers = $infos["metiers"];
        $this->frais = $infos["frais"];
        $this->lieu = $infos["lieu"];
    }

    /**
     * @return mixed
     */
    public function getActiviteType()
    {
        return $this->activite_type;
    }

    /**
     * @return mixed
     */
    public function getAlternance()
    {
        return $this->alternance;
    }

    /**
     * @return mixed
     */
    public function getBac()
    {
        return $this->bac;
    }

    /**
     * @return mixed
     */
    public function getCertif()
    {
        return $this->certif;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @return mixed
     */
    public function getFormationsContinue()
    {
        return $this->formations_continue;
    }

    /**
     * @return mixed
     */
    public function getFrais()
    {
        return $this->frais;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @return mixed
     */
    public function getMetiers()
    {
        return $this->metiers;
    }

    /**
     * @return mixed
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getPrerequis()
    {
        return $this->prerequis;
    }
    public static function getAllFormations():array
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
SELECT *
FROM Formation
where description = 0
SQL
        );
        $results= [] ;
        $stmt->execute();
        foreach ($stmt->fetchAll()as $formation)
        {
            $results[] = New Formation($formation);
        }
        return $results;
    }
    public static function getFormationById(int $id):Formation
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
SELECT * 
FROM Formation
where id = :id and description = 0
SQL
);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return New Formation($stmt->fetch());
    }
    public static function getFormationByAlternance():array
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
SELECT *
FROM Formation
where alternance = 1 and description = 0
SQL
);
        $results= [] ;
        $stmt->execute();
        foreach ($stmt->fetchAll()as $formation)
        {
            $results[] = New Formation($formation);
        }
        return $results;
    }
    public static function getFormationByContinue():array
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
SELECT *
FROM Formation
where formations_continue = 1 and description = 0
SQL
        );
        $results= [] ;
        $stmt->execute();
        foreach ($stmt->fetchAll()as $formation)
        {
            $results[] = New Formation($formation);
        }
        return $results;
    }
    public static function createNewFormation(array $data)
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
SELECT MAX(id) as 'id'
from Formation
SQL
);
        $stmt->execute();
        $maxID = $stmt->fetch();
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
INSERT INTO Formation 
VALUES (:id,:description,:nom,:niveau,:bac,:duree,:alternance,:formations_continue,:certif,:activite_type,:prerequis,:metiers,:frais,:lieu)
SQL

);
        $maxID=(int)$maxID["id"] + 1;
        $stmt->bindParam(':id',$maxID);
        $var = "0";
        $stmt->bindParam(':description', $var);
        $stmt->bindParam(':nom',$data["formation_name"]);
        $stmt->bindParam(':niveau',$data["niveau"]);
        $stmt->bindParam(':bac',$data["bac"]);
        $stmt->bindParam(':duree',$data["duree"]);
        $stmt->bindParam(':alternance',$data["alternance"]);
        $stmt->bindParam(':formations_continue',$data["formations_continue"]);
        $stmt->bindParam(':certif',$data["certif"]);
        $stmt->bindParam(':activite_type',$data["activite_type"]);
        $stmt->bindParam(':prerequis',$data["prerequis"]);
        $stmt->bindParam(':metiers',$data["metiers"]);
        $stmt->bindParam(':frais',$data["frais"]);
        $stmt->bindParam(':lieu',$data["lieu"]);

        $stmt->execute();
    }
    public static function updateFormation(array $data)
    {

        $stmt = MyPDO::getInstance()->prepare(<<<SQL
UPDATE Formation 
set description =:description,nom = :nom, niveau = :niveau,bac = :bac, duree = :duree,alternance = :alternance, formations_continue = :formations_continue,certif = :certif,activite_type = :activite_type,prerequis = :prerequis,metiers = :metiers,frais = :frais,lieu = :lieu
where id = :id
SQL

        );

        $stmt->bindParam(':id',$data["id"]);
        $var = "0";
        $stmt->bindParam(':description', $var);
        $stmt->bindParam(':nom',$data["formation_name"]);
        $stmt->bindParam(':niveau',$data["niveau"]);
        $stmt->bindParam(':bac',$data["bac"]);
        $stmt->bindParam(':duree',$data["duree"]);
        $stmt->bindParam(':alternance',$data["alternance"]);
        $stmt->bindParam(':formations_continue',$data["formations_continue"]);
        $stmt->bindParam(':certif',$data["certif"]);
        $stmt->bindParam(':activite_type',$data["activite_type"]);
        $stmt->bindParam(':prerequis',$data["prerequis"]);
        $stmt->bindParam(':metiers',$data["metiers"]);
        $stmt->bindParam(':frais',$data["frais"]);
        $stmt->bindParam(':lieu',$data["lieu"]);

        $stmt->execute();
    }


}
/*
$results = Formation::GetFormationAlternance();
$name = $results[$i]->getMetiers();
echo $name;
*/