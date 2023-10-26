<?php
namespace App\Controllers;

use App\Controllers\ControllerAccueil;
use App\Controllers\ControllerRecette;
use App\Vue\Vue;
use Exception;
use PDOException;

// require_once 'Controllers/ControllerAccueil.php';
// require_once 'Controllers/ControllerRecette.php';
// require_once 'Modele/Commentaire.php';
// require_once 'Vue/Vue.php';

class Router
{
    private $ctrlAccueil;
    private $ctrlRecette;

    public function __construct() {
        $this->ctrlAccueil = new ControllerAccueil;
        $this->ctrlRecette = new ControllerRecette;
    }
    // Traite une requête entrante
    public function routerRequete() {
        // le try permet de tester le code transmis 
        //et le catch de gérer les erreurs d'exécution
        try {
            
            if (isset($_GET['action'])){
                
                if ($_GET['action'] == "recette") {
                    if (isset($_GET['id'])) {
                        $id = intval($_GET['id']);
                            if ($id != 0) {
                                $this->ctrlRecette->oneRecipe($id);
                            }else {
                                throw new Exception("Id non valide", 3);
                            }
                    } else {
                        throw new Exception("Id non existant", 2);
                    }
                } elseif ($_GET['action'] == "commenter") {
                    if (isset($_POST['auteur']) && isset($_POST['contenu'])&& isset ($_POST['idRecette'])) {
                        $auteur = $_POST['auteur'];
                        $contenu = $_POST['contenu'];
                        $idRecette = $_POST['idRecette'];
                            
                        $this->ctrlRecette->commenter($auteur, $contenu, $idRecette);
                            
                    } else {
                        throw new Exception("Id non existant", 2);
                    }                  
                
                
            }} else {
                   
                $this->ctrlAccueil->accueil();
                
            }
        } catch (PDOException $e) {
            $this->erreur($e->getMessage());
        } 
    }

    public function erreur($msgErreur)
    {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}