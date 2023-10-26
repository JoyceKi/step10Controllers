<?php
namespace App\Vue;

class Vue
{
    public $fichier;
    public $titre;

    public function __construct($action)
    {
        // on détermine le nom du fichier vue à partir de l'action
        $this->fichier = "Vue/Vue$action.php";
    }

    public function generer($donnees)
    {
        // On stock les données du ob_start dans $contenu via la méthode genererFichier
        $contenu = $this->genererFichier($this->fichier,$donnees);
        // on la rappelle pour y ajouter le gabarit
        $vue = $this->genererFichier('Vue/gabarit.php', 
            ['titre' => $this->titre,
            'contenu' => $contenu,
            ]);
        echo $vue;
    }

    //on récupère les données mises en tampon par ob_start et on le return
    public function genererFichier($fichier,$donnees)
    {
        if (file_exists($fichier)) {

            extract($donnees);

            ob_start();

            require $fichier;

            return ob_get_clean();
        } else {
            throw new Exception("Fichier $fichier introuvable",1);
        }
    }
}