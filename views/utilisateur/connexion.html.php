<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Formulaire de connexion au website repertoire-telephonique">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Formulaire de connexion</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/repertoire-telephonique/router.php/accueil">Accueil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/repertoire-telephonique/router.php/liste-contacts">Contacts</a>
          </li>
          <?php
            if(isset($_SESSION['utilisateur'])&& $_SESSION['utilisateur']== "admin")
            {
                echo '
          <li class="nav-item">
            <a class="nav-link" href="/repertoire-telephonique/router.php/ajouter-contact">Ajouter un Contact</a>
          </li>
          <li class="nav-item">
            <a style="color:red" class="nav-link active" aria-current="page" href="/repertoire-telephonique/router.php/deconnexion">'.
            $_SESSION['utilisateur']
          .' : se deconnecter</a>
          </li>
                ';
            }else{
              echo '
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/repertoire-telephonique/router.php/connexion">Connexion</a>
          </li>
              ';
            }
          ?>
        </ul>
    </div>
  </div>
</nav>
<h1>Connectez-vous au site :</h1>

<?php
    if ($messageErreur !== null) 
    {
?>

    <div class="alert alert-danger" role="alert">
        <?php echo $messageErreur; ?>
    </div>

<?php
    }
?>

<form method="POST" action="/repertoire-telephonique/router.php/connexion" enctype="multipart/form-data" class="p-5">
    <div>
        <label for="utilisateur-identifiant">Identifiant :</label>
        <input type="text" name="utilisateur-identifiant" class="form-control">
    </div>
    <div>
        <label for="utilisateur-pwd">Mot de passe :</label>
        <input type="password" name="utilisateur-pwd" class="form-control">
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="connexion-checkbox">
        <label class="form-check-label" for="flexCheckDefault">
            Rester connecter ?
        </label>
    </div>
    <button name="btn-valider-connexion" type="submit" class="btn btn-primary">Se connecter</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>