<?php
namespace App\Modele;

use PDO;
abstract class Modele {

/**
 * objet PDO d'accès à la BD
 * @var object
 */
private $bdd; 

protected function executerRequete($sql, $params = null)
{
    if ($params == null) {
        $resultat = $this->getBdd()->query($sql);// exécution directe
    } else {
        $resultat = $this->getBdd()->prepare($sql); // requête préparée
        $resultat->execute($params);
    }
    return $resultat;
}

private function getBdd(): PDO
{
    if ($this->bdd == null) {
    $username = "root";
    $password = "";
    $dsn = "mysql:host=localhost; dbname=bdd_blog_culinaire; port=3306; charset=utf8";
    $this->bdd = new PDO($dsn, $username, $password);
    $this->bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $this->bdd;
}

}
?>