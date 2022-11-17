<?php

require_once "../modeles/pdo.php";

//faire l'héritage Database
class Connexion extends PdoConnect {
    private $nomUtilisateur ;
    private $emailUtilisateur ;
    private $passwordUtilisateur ;
    private $passwordRepete ;


//-----------------------------------------------------------------------------------------------------

    //faire la connexion pour utilisateur
    public function utilisateurConnexion() {

        //faire appel à la methode public getPDO()

        $baseArticle = $this->getPDO();

        //Verifie si utilisateurs est deja connecté

        if (isset($_SESSION['connecterUser']) && $_SESSION['connecterUser'] === true) {

            //afficher le mail de l'utilisateur
            ?>
            <h2>BIENVENUE<?= $_POST['emailUtilisateur'] ?></h2>
            <?php
            // Sinon, l'utilisateur doit s'inscrire
        }else{

            echo "<h5 class='alert-primary '>Veuillez vous inscrire <a href='inscription' class='btn btn-info'>S'incrire</a></h5>";
        }

        //Verifier le champs de formulaire email et mot de passe
        if (isset($_POST['emailUtilisateur']) && !empty($_POST['emailUtilisateur'])) {

            $this->emailUtilisateur = trim(htmlspecialchars($_POST['emailUtilisateur']));
        } else {

            //afficher le message d'erreur pour l'email
            echo "<h5 class='alert-warning p-5'>Merci remplir le champ Email</h5>";
        }
        //Verifier le mot de passe
        if (isset($_POST['passwordUtilisateur']) && !empty($_POST['passwordUtilisateur'])) {
            $this->passwordUtilisateur = trim(htmlspecialchars($_POST['passwordUtilisateur']));
        } else {
            //message d'erreur pour le mot de passe
            echo "<h5 class='alert-warning p-5'>Merci remplir le mot de passe</h5>";
        }

        //faire la requete
        if (!empty($_POST['emailUtilisateur']) && !empty($_POST['passwordUtilisateur'])) {

            $sql = "SELECT * FROM utilisateurs WHERE emailUtilisateur = ? AND role = ?";

            //Requète préparée
            $Utilisateur = $baseArticle->prepare($sql);
            $role = "utilisateur";


            $Utilisateur->bindParam(1, $this->emailUtilisateur);
            $Utilisateur->bindParam(2, $role);
            $Utilisateur->execute(
                    array(
                            $this->emailUtilisateur,
                            $role
                    )
            );

            //parcourir la table utilisateur
            if ( $Utilisateur->rowCount() >= 1) {

                //afficher les elements
                $count =  $Utilisateur->fetch(PDO::FETCH_ASSOC);

                if ($this->emailUtilisateur === $count['emailUtilisateur']
                    && password_verify($this->passwordUtilisateur, $count['passwordUtilisateur'] ) && $role === $count['role']) {

                    //demarrer la  seesion qu'on stock dans une variable
                    session_start();

                    $_SESSION['connecterUser'] = true;
                    $_SESSION['emailUtilisateur'] = $this->emailUtilisateur;

                    //faire la redirection à la page d'accueil
                    header("Location: accueil");


                    //faire les trois message d'erreurs
                } else {
                    //pas d'egalité
                    echo "<p class='alert-danger p-2'>erreur email et mot passe ne sont pas correct !</p>";
                }
            } else {
                //table vide
                echo "<p class='alert-danger mt-3 p-2'>Aucun utilisateur ne possède cet email et mot de passe</p>";
            }
        } else {
            //champs vide
            echo "<p class='alert-danger p-2'>Merci de remplir tous les champs</p>";
        }
    }
}


    //--------------------------------------------------------------------------------------------------------



