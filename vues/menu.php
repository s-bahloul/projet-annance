<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



    <title>Navbar</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-info m-5">

    <div class="container-fluid">



        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="accueil" class="nav-link active m-2" aria-current="page" >Accueil</a>
                </li>

                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-warning dropdown-toggle m-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Regions
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Auvergne-Rhône-Alpes</a></li>
                            <li><a class="dropdown-item" href="#">Bourgogne-Franche-Comté</a></li>
                            <li><a class="dropdown-item" href="#">Bretagne</a></li>
                            <li><a class="dropdown-item" href="#">Centre-Val de Loire</a></li>
                            <li><a class="dropdown-item" href="#">Corse</a></li>
                            <li><a class="dropdown-item" href="#">Grand Est</a></li>
                            <li><a class="dropdown-item" href="#">Hauts-de-France</a></li>
                            <li><a class="dropdown-item" href="#">Île-de-France</a></li>
                            <li><a class="dropdown-item" href="#">Normandie</a></li>
                            <li><a class="dropdown-item" href="#">Nouvelle-Aquitaine</a></li>
                            <li><a class="dropdown-item" href="#">Occitanie</a></li>
                            <li><a class="dropdown-item" href="#">Pays de la Loire</a></li>

                        </ul>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="btn btn-warning dropdown-toggle m-2 " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </button>
                        <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Vacances</a></li>
                            <li><a class="dropdown-item" href="#">Emploi</a></li>
                            <li><a class="dropdown-item" href="#">Véhicules</a></li>
                            <li><a class="dropdown-item" href="#">Immobillier</a></li>
                            <li><a class="dropdown-item" href="#">Mode</a></li>
                            <li><a class="dropdown-item" href="#">Maison</a></li>
                            <li><a class="dropdown-item" href="#">Multimédia</a></li>
                            <li><a class="dropdown-item" href="#">Loisirs</a></li>
                            <li><a class="dropdown-item" href="#">Animaux</a></li>
                            <li><a class="dropdown-item" href="#">Matériel Professionnel</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark m-2" href="#">Favoris</a>
                </li>

            </ul>
        </div>

        <form class="d-flex">

            <a href="inscription" class="m-3 btn btn-primary ">Inscription</a>

            <?php
            //En cas de connexion, le bouton connexion devient deconnexion et en cas de déconnexion , le bouton devient connexion
            if(isset($_SESSION['connecterUser']) && $_SESSION['connecterUser'] === true){
                ?>
                <a class="m-3 btn btn-info" href="Deconnexion">Déconnexion</a>
                <?php
            }else{
                ?>

                <a href="connexion" class="m-3 btn btn-secondary ">Connexion</a>
                <?php
            }
            ?>
        </form>
    </div>



</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

