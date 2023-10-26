<?php
namespace App\Controllers;

use App\Modele\Recette;
use App\Modele\Commentaire;
use App\Vue\Vue;

// require_once './Modele/Recette.php';
// require_once './Modele/Commentaire.php';
// require_once './Vue/Vue.php';

class ControllerAccueil
{
    private $recette;
    private $commentaire;

    public function __construct()
    {
        $this->recette = new Recette();
        $this->commentaire = new Commentaire();
    }

    // Affiche la recette aléatoire
    // Affiche les 3 dernières recettes
    // Affiche les 3 dernièrs commentaires
    public function accueil()
    {
        $recipe = $this->recette->getRecipe();
        $recipes = $this->recette->getRecipes();
        $coms = $this->commentaire->getComs(); 
        $vue = new Vue("Accueil");
        $vue->generer(array('recipe' => $recipe, 'recipes' => $recipes, 'coms' => $coms));
    }
}
