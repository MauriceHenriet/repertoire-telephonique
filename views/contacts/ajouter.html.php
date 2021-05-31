<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ajouter un contact au repertoire-telephonique">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Ajouter un contact</title>
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
<h1>Ajouter un contact :</h1>

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

<form method="POST" action="/repertoire-telephonique/router.php/ajouter-contact" enctype="multipart/form-data" class="p-5">
    <div>
        <label for="contact-name">Nom :</label>
        <input type="text" name="contact-name" class="form-control">
    </div>
    <div>
        <label for="contact-firstname">Prénom :</label>
        <input type="text" name="contact-firstname" class="form-control">
    </div>
    <div>
        <label for="contact-phone">Téléphone :</label>
        <input type="tel" name="contact-phone" class="form-control">
    </div>
    <div>
        <label for="contact-email">Email :</label>
        <input type="email" name="contact-email" class="form-control">
    </div>
    <div>
        <label for="contact-image">Photo :</label>
        <input type="file" name="contact-image" class="form-control">
    </div>
    <button name="btn-valider" type="submit" class="btn btn-primary">Ajouter Contact</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>