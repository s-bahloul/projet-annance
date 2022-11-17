
<div id="form-user">

    <h1 class="text-center text-info m-5">CONNEXION UTILISATEUR</h1>

    <div class="container bg-primary">
        <form method="post">



            <div class="form-group">
                <label for="InputEmail1">Email</label>
                <input type="email" name="emailUtilisateur" class="form-control" id="InputEmail1" placeholder="Email">
            </div>

            <div class="form-group">
                <label for="InputPassword1">Mot de passe</label>
                <input type="password" name="passwordUtilisateur" class="form-control" id="InputPassword1" placeholder="Mot de passe">
            </div>

            <div class="form-group">
                <label for="InputPassword1">Confirmer le mot de passe</label>
                <input type="password" name="passwordRepete" class="form-control" id="InputPassword1" placeholder="Mot de passe">
            </div>

            <!--Ce bouton est recup via son attribut name et methode post $_POST['btn_valid_user']-->

            <div class="container text-center  p-4">
                <button name="btnConnectUtilisateur" type="submit" class="btn btn-info">Connexion</button>
            </div>
        </form>
    </div>

</div>



