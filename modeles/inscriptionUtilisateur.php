<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//faire appele à Load Composer's autoloader
require '../vendor/autoload.php';

//Appeler PDO pour la connexion
require_once '../modeles/pdo.php';

//faire l'héritage PdoConnect
class Inscription extends PdoConnect{

    //variable privées de la table utilisateur
    private $idUtilisateur;
    private $emailUtilisateur;
    private $passwordUtilisateur;
    private $role;

    //la function pour l'inscription à appeler dans le controleur
    public function emailInscription(){

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = 'cb5f05d4decad9';
            $mail->Password = '524bea6ac197ae';
            $mail->setLanguage('fr', '../vendor/phpmailer/phpmailer/language/');
            $mail->CharSet = 'UTF-8';



            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
            $mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');

            //Attachments
//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Inscription';

            //faire la connexion PDO
            $email =$this->getPDO();

            //desinfecter les champs et luter contre les injection sql
            $this->emailUtilisateur = trim(htmlspecialchars($_POST['emailUtilisateur']));
            $this->passwordUtilisateur = trim(htmlspecialchars($_POST['passwordUtilisateur']));

            var_dump($_POST['emailUtilisateur']);

            //la requete sql
            $sql = "SELECT * FROM utilisateurs WHERE emailUtilisateur = ?";

            //Faire la requete preparée
            $requete = $email->prepare($sql);
            $requete->execute(
                array($this->emailUtilisateur)
            );

            //on recupére le dernier resultat de la requete
            $resultat = $requete->fetch();

            //faire le message d'erreur si le mail rentré existe déja
            if($resultat){
                echo"<h5 class='alert-warning p-2'>Cet email n'est pas disponible</h5>";

                //retour à la page d'inscription
                ?>
                <div class="container  text-center  m-2">
                    <a  href="inscriptionUtilisateur" class="btn btn-info  ">Retour</a>
                </div>
        <?php

            }else{

                //si l'email n'ixiste pas , on fait la requete d'inscription

                //on fait une liste déroulante pour donner le choix à l'utilisateur de choisir entre admin et utilisateur
                //on stock le role utilisateur dans une variable
                $role = "utilisateur";

                //on fait la requete preparé
                $sql = "INSERT INTO utilisateurs(emailUtilisateur, passwordUtilisateur, role) VALUES (?,?,?)";


                $request = $email->prepare($sql);

                //Lie les 3 champs du formulaire a la requète SQL

                $request ->bindParam(1, $this->emailUtilisateur);
                $request ->bindParam(2, $this->passwordUtilisateur);
                $request ->bindParam(3, $role);


                //Faire le Hashage de mot passe
                $hashPassword = password_hash($this->passwordUtilisateur, PASSWORD_DEFAULT);
                //on execute la requète (le second paramètre est le mot de passe haché)
                $request->execute(
                    array(
                        $this->emailUtilisateur,
                        $hashPassword,
                        $role
                    )
                );

                //Redirection vers le site
                $redirection = "http://localhost/ProjetAnnonces/connexionUtilisateur";


                //faire le corps du mail
                $mail->Body = '

                     <!DOCTYPE html>
                        <html lang="fr">
                        <head>
                            <meta charset="UTF-8">
                            <meta http-equiv="Content-Type" content="text/html">
                            <title>Inscription.com</title>
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                         </head>
                          <body style="color: #43617f; font-size: 30px;text-align: center; padding: 20px">
                            <div style="padding: 20px;">
                             <h1>Inscription.com</h1>
                            <h2>Bonjour : '.$this->emailUtilisateur.'</h2>
                            <p>Vous êtes desormais inscrit sur le site inscription.com merci de valider votre inscription avec le liens suivant</p><br />
                            <p>Recapitulatif de vos information de connexion</p>
                            <p>Email :<b style="color: #8b0000"> '.$this->emailUtilisateur.'</b></p>
                            <p>Mot de passe :<b style="color: #8b0000;">'.$this->passwordUtilisateur.'</p>
                            <br /><br />
                            <a href="' . $redirection . '" style="background-color: darkred; color: #F0F1F2; padding: 20px; text-decoration: none;">Confimer votre inscription sur notre site</a><br />


                        </div>
                        </body>
                        </html>

                            ';

   //Conversion de HTML5
                $mail->body = "MIME-Version: 1.0" . "\r\n";
                $mail->body .= "Content-type:text/html;charset=utf8" . "\r\n";


                //Envoi de email
                $mail->send();
                //Message de succes + bouton pour aller a la connexion
                echo "<div class='container text-center'>
                            <div class='w-100 alert alert-success text-center'>Merci pour votre inscription, 
                            un email de validation vous à été envoyé, merci de validé votre inscription pour acceder à votre tableau de bord.</div>
                            <a href='connexionUtilisateur' class='btn btn-warning'>Connexion</a>                                                       
                        </div>";
            }

        } catch (Exception $e) {
            echo "<p class='alert alert-danger'>Une erreur est survenue lors de votre inscription, merci de vérifié les champs !</p>";
            die();
        }
            }
        }



