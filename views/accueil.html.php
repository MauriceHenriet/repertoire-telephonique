<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page d'accueil du website repertoire-telephonique">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Page d'accueil du website repertoire-telephonique</title>
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
<h1>Bienvenue sur le repertoire-telephonique</h1>
<p>
Lorem ipsum dolor sit amet consectetur adipisicing elit. 
Quasi, cupiditate non voluptate esse aut beatae quam ipsam iure voluptatem eligendi dolorum. 
Quia unde eum assumenda fugit consequuntur, facilis dolorem molestiae magnam at tempore placeat rem hic harum, 
quae earum corrupti repellat excepturi suscipit asperiores nam perferendis amet? 
Nemo, recusandae quia nostrum sunt corrupti voluptates saepe quibusdam commodi quidem obcaecati 
beatae nesciunt placeat expedita pariatur? Quia autem laudantium ipsa aspernatur delectus 
tempore ipsum earum amet perspiciatis. Atque, rem error incidunt amet quasi nobis! Quas quod 
neque eveniet repellendus illum porro deserunt quidem necessitatibus voluptate culpa nulla 
quo labore laboriosam adipisci facere officia dignissimos ullam, quam magnam cumque placeat?
 Reprehenderit, vero. Odit quasi ipsum enim totam impedit iusto ea nam corporis fugiat, 
 recusandae dolore beatae eligendi, voluptates rem? Velit saepe inventore distinctio ad quas
  facilis provident voluptas aut consectetur vel voluptatum, tempora consequuntur soluta eos 
  fugit, sunt, tenetur atque cupiditate voluptatem iure praesentium.
</p>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>