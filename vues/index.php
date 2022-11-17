<?php
//faire une session start pour démarer $_session
session_start();

//ob_start() ouvre un tampon dans lequel toutes les sorties sont stockées. Ainsi,
//chaque fois que vous faites un écho, la sortie de celui-ci est ajoutée au tampon

ob_start();
//Si dans url, un paramètre $_GET['url'] existe, on le stock dans une variable $url

require_once "../controleurs/controleurArticle.php";
require_once "../controleurs/controleurUtilisateur.php";

if(isset($_GET['url'])){

    //stocker la route dans une variable
    $url = $_GET['url'];

//si non, $url = "accueil"
}else{
    $url = "accueil";
}

//Si $url retourne une chaine de caractères vide
if($url === ""){

    //redirection vers la page d'accueil
    $url = "accueil";
}


//Si $url = "accueil"
if($url === "pagesplach"){
    // appeler le fichier accueil.php
    pagesplash();
    //si non s'il ya une erreur

}elseif ($url === "accueil"){
   afficherarticle();

}elseif ($url === "inscription") {
    inscriptionUtilisateurFormulaire();

}elseif ($url === "connexion") {
    connexionUtilisateurFormulaire();

}elseif ($url === "deconnexion") {
    deconnectUtilisateur();

}elseif($url !=  '#:[\w]+)#'){
    //faire la redirection vers la page d'accueil
    header("Location: pagesplach");


}

//ob_get_clean — exécute successivement ob_get_contents() et ob_end_clean().
//$contenus se situe dans le dossier template.php
$contenus = ob_get_clean();
require_once "template.php";


