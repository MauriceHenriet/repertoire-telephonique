<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="liste des contacts du repertoire-telephonique">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Liste des contacts du repertoire-telephonique</title>
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
<h1>Contacts :</h1>

<table class="table table-striped w-75 mx-auto">
    <tr>
        <th>Photo</th>
        <th>Nom</th>
        <th>Prénom</th>
        <?php
            if(isset($_SESSION['utilisateur'])&& $_SESSION['utilisateur']== "admin")
            {
              echo '
        <th>Numéro de tél</th>
        <th>Adresse eMail</th>
        <th>Actions</th>';
            }
        ?>
    </tr>   
     <?php
      if(isset($_SESSION['utilisateur'])&& $_SESSION['utilisateur']== "admin")
      {
        foreach ($liste_contacts as $contact) 
        {
          echo '
    <tr>
      <td class="w-25"><img style="width:100px"  src="/repertoire-telephonique'. $contact->image .'" alt="'. $contact->nom .'"></td>
      <td class="w-25">'. $contact->nom .'</td>
      <td class="w-25">'. $contact->prenom .'</td>  
      <td class="w-25">
        <a href="tel:'.$contact->num_tel .'">'. $contact->num_tel .'</a>
      </td>
      <td class="w-25">
      <!--
        <a href="/repertoire-telephonique/router.php/ecrire-contact?id='.$contact->id .'">'. $contact->email .'</a>
       -->
        <a href="mailto:'.$contact->email .'">'. $contact->email .'</a>
      </td>
      <td class="w-100">  
        <a href="/repertoire-telephonique/router.php/modifier-contact?id='. $contact->id .'" class="btn btn-warning">Modifier</a>
        <a href="/repertoire-telephonique/router.php/supprimer-contact?id='. $contact->id .'" class="btn btn-danger">Supprimer</a>
      </td>
    </tr>';  
        }
      }
      else
      {
        foreach ($liste_contacts as $contact) 
        {
          echo '
    <tr>
      <td class="w-25"><img style="width:100px"  src="https://lezebre.lu/images/detailed/16/22058-bugs-bunny.png" alt="'. $contact->nom .'"></td>
      <td class="w-25">'. $contact->nom .'</td>
      <td class="w-25">'. $contact->prenom .'</td>
    </tr>';  
        }
      }
    ?>
</table>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>