<?php
namespace App\Controllers;

use App\Modele\Recette;
use App\Modele\Commentaire;
use App\Vue\Vue;



// require_once './Modele/Recette.php';
// require_once './Modele/Commentaire.php';
// require_once './Vue/Vue.php';

class ControllerRecette
{
    private $recette;
    private $commentaire;

    public function __construct()
    {
        $this->recette = new Recette();
        $this->commentaire = new Commentaire();
    }

    // Affiche la recette choisie
    public function oneRecipe($id)
    {
        $single = $this->recette->getSingle($id);
        $comments = $this->commentaire->getComments($id);
        $vue = new Vue("Recette");
        $vue->generer(array('single' => $single, 'comments' => $comments));
    }

    public function commenter ($auteur, $contenu, $idRecette)
    {
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idRecette);
        $this->oneRecipe($idRecette);
        
        
    }
}