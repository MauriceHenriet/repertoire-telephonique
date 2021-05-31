<?php
// Définitions des constantes
const DOSSIER_VIEWS = __DIR__.'/views';
const DOSSIER_CONTROLLERS = __DIR__.'/src/controllers';
const DOSSIER_MODELS = __DIR__.'/src/models';
  
// Connexion à la base de données
include __DIR__.'/SimpleOrm.class.php';
$conn = new mysqli('localhost', 'root', '');
SimpleOrm::useConnection($conn, 'repertoire_telephonique');

// Inclusion des fonctions réutilisables
include __DIR__.'/functions.php';
include DOSSIER_MODELS.'/Contacts.php';
include DOSSIER_MODELS.'/Utilisateur.php';

session_start();

// Déclaration des routes
if (isset($_SERVER['PATH_INFO']) == false) 
{
    require DOSSIER_CONTROLLERS.'/accueil.php';
    index();
} else if ($_SERVER['PATH_INFO'] == '/accueil')
{
    require DOSSIER_CONTROLLERS.'/accueil.php';
    index();
} else if ($_SERVER['PATH_INFO'] == '/liste-contacts')
{
    require DOSSIER_CONTROLLERS.'/contacts.php';
    index();
} else if ($_SERVER['PATH_INFO'] == '/ajouter-contact')
{
    require DOSSIER_CONTROLLERS.'/contacts.php';
    create();
} else if ($_SERVER['PATH_INFO'] == '/modifier-contact')
{
    require DOSSIER_CONTROLLERS.'/contacts.php';
    update();
} else if ($_SERVER['PATH_INFO'] == '/supprimer-contact')
{
    require DOSSIER_CONTROLLERS.'/contacts.php';
    delete();
} else if ($_SERVER['PATH_INFO'] == '/connexion')
{
    require DOSSIER_CONTROLLERS.'/utilisateur.php';
    connect();
} else if ($_SERVER['PATH_INFO'] == '/deconnexion')
{
    require DOSSIER_CONTROLLERS.'/utilisateur.php';
    deconnect();
} else
{
    require DOSSIER_CONTROLLERS.'/notfound.php';
    index();
}
