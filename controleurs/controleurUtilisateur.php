<?php
//Appel des modeles
require_once "../modeles/inscriptionUtilisateur.php";
require_once "../modeles/connexionUtilisateur.php";



//fonction d'afficher le formulaire pour inscrire l'utilisateur
function inscriptionUtilisateurFormulaire(){

//appeler le fichier vue
    require_once "../vues/inscriptionUtilisateurVue.php";

    //recupérer le name du formulaire pour activer le bouton de la connexion

    if(isset($_POST['btnInscritUtilisateur'])){

    //faire la condition pour l'email pour rentrer les bon caractére
        if (preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}$/', $_POST['emailUtilisateur'])) {
            echo "<h5 class='alert-warning p-2'>Votre mail est valide</h5>";
        }else{
            echo "<h5 class='alert-warning p-2'>Votre mail n'est pas valide</h5>";
        }

   //faire la condition pour le mot de pass
        if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $_POST['passwordUtilisateur'])) {
            echo "<h5 class='alert-warning p-2'>Votre mot de passe est  valide</h5>";
        }else{
            echo "<h5 class='alert-warning p-2'>Votre mot de passe n'est pas valide</h5>";
        }

    //Confirmer le mot de passe
        if($_POST['passwordUtilisateur'] === $_POST['passwordRepete']){

            //faire une instance de la class inscription utilisateur pour récupérer le methode d'inscription dans le modele
            $inscription = new Inscription();
            $requete = $inscription->emailInscription();
            return $requete;
        }else{
            echo "<h5 class='alert-warning p-2'>Les deux mots de passe ne sont pas identique</h5>";

            //faire un bouton de retour
            ?>
    <a href="inscription" class="btn btn-info">RETOUR</a>
<?php
        }

    }


}


//______________________________________________________________________________________________________

//fonction d'afficher le formulaire pour la connexion de l'utilisateur
function connexionUtilisateurFormulaire(){

//appeler le fichier vue
    require_once "../vues/connexionUtilisateurVue.php";

    //recupérer le name du formulaire pour activer le bouton de la connexion

    if(isset($_POST['btnConnectUtilisateur'])){


        //Confirmer le mot de passe
        if($_POST['passwordUtilisateur'] === $_POST['passwordRepete']){

            //faire une instance de la class inscription utilisateur pour récupérer le methode d'inscription dans le modele
            $connexion = new Connexion();
            $requete = $connexion->utilisateurConnexion();
            return $requete;
        }else{
            echo "<h5 class='alert-warning p-2'>Les deux mots de passe ne sont pas identique</h5>";

            //faire un bouton de retour
            ?>
            <a href="connexion" class="btn btn-info">RETOUR</a>
            <?php
        }

    }

    //_______________________________________________________________________________
    //fonction pour la deconnexion utilisateur
    function deconnectUtilisateur(){

    //appeler le fichier vue
            require_once "../vues/deconnectUtilisateurVue.php";

            //recupérer le name du formulaire pour activer le bouton de la connexion

            if(isset($_POST['btnDeconnectUtilisateur'])){

        $_SESSION = array();
// detruire la session
        session_destroy();

//faire la redirection
        header("Location: Connexion");
    }


}
}

