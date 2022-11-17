<?php

//faire appel au fichier modele acceuil
require_once "../modeles/articles.php";

//faire une fonction a appeler dans le routeur


//la fonction pour afficher la splash page
function pagesplash(){

    //faire appel au fichier  vue de la page splash
    require_once "../vues/splachpage.php";

}

//la fonction pour afficher les article
function afficherarticle(){
    //appel de la vue

    $articleclass = new Article();

    $articles = $articleclass->afficherArticles();

    require_once "../vues/accueil.php";

    return $articles;
}







