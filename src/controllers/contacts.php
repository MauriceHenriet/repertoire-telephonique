<?php

function verifierPayload(array $data, array $file)
{
    if (!isset($data['contact-name']) || $data['contact-name'] === '')
    {
        return "Vous devez spécifier un nom";
    }
    if (!isset($data['contact-firstname']) || $data['contact-firstname'] === '')
    {
        return "Vous devez spécifier un prénom";
    }
    if (!isset($data['contact-phone']) || $data['contact-phone'] === '')
    {
        return "Vous devez spécifier un numéro de téléphone";
    }
    if (!isset($data['contact-email']) || $data['contact-email'] === '')
    {
        return "Vous devez spécifier un email";
    }
    if (!isset($file['contact-image']) && $file['contact-image']['name'] !== '')
    {
        if(!in_array($file['contact-image']['type'],['image/webp', 'image/png', 'image/jpg', 'image/jpeg']))
        {
            return "Le type de fichier " .$file['contact-image']['type'] . " n'est pas pris en charge";
        }
        if($file['contact-image']['size'] > 10000000 )
        {
            return "Le fichier est trop gros : il fait ". $file['contact-image']['size']." octets";
        }
        
    }
    return null;
}

function convertirPayloadEnObjet(array $data, array $file)
{
    $fichier = enregistrerFichierEnvoye($file["contact-image"]);

    $contact = new Contacts();
    $contact->nom = $data['contact-name'];
    $contact->prenom = $data['contact-firstname'];
    $contact->num_tel = $data['contact-phone'];
    $contact->email = $data['contact-email'];
    $contact->image = $fichier;

    return $contact;
}

function mettreAJourPayload(Contacts $contact, array $data, array $file)
{
    //on récupère le chemin vers l'ancienne image
    $ancienneImage = $contact->image;
    if($_FILES["contact-image"]["name"] != ""){
        // si lors de la modification on a uploadé une nouvelle image on supprime l'ancienne image
        unlink(__DIR__ .'/../..'.$ancienneImage);
        // on charge la nouvelle image
        $fichier = enregistrerFichierEnvoye($file["contact-image"]);
        $contact->image = $fichier;
    }else{
        //sinon on garde la même image
        $contact->image = $ancienneImage;
    }

    $contact->nom = $data['contact-name'];
    $contact->prenom = $data['contact-firstname'];
    $contact->num_tel = $data['contact-phone'];
    $contact->email = $data['contact-email'];

    return $contact;
}

/////////////////////////////////////////////////////////////////////////////
function index()
{
    $liste_contacts = Contacts::all();

    include DOSSIER_VIEWS.'/contacts/liste-contacts.html.php';
}

function create()
{
    $contact = new Contacts();
    $messageErreur = null;
    if (isset($_POST['btn-valider']))
    {
        $messageErreur = verifierPayload($_POST, $_FILES);
        if ($messageErreur === null)
        {
            $contact = convertirPayloadEnObjet($_POST, $_FILES);
            $contact->save();
            onVaRediriger('/liste-contacts');
        }
    }
    
    include DOSSIER_VIEWS.'/contacts/ajouter.html.php';
}

function update()
{
    if (!isset($_GET['id']))
    {
        die();
    }
    
    $contactModif = Contacts::retrieveByPK($_GET['id']);
    $messageErreur = null;
    
    if (isset($_POST['btn-valider-modifications']))
    {
        $messageErreur = verifierPayload($_POST, $_FILES);
            
        if ($messageErreur === null)
        {
            $contactModif = mettreAJourPayload($contactModif, $_POST, $_FILES);
            $contactModif->save();
            onVaRediriger('/liste-contacts');
        }
    }  

    include DOSSIER_VIEWS.'/contacts/modifier.html.php';
}

function delete()
{
    if (!isset($_GET['id']))
    {
        die();
    }
    // on récupère le contact à supprimer
    $contact = Contacts::retrieveByPK($_GET['id']);
    // si le contact à supprimer a une image on supprime cette image
    if($contact->image != NULL)
    {
        unlink(__DIR__ .'/../..'.$contact->image);
    }
    // on supprime le contact de la BDD
    $contact->delete();
    onVaRediriger('/liste-contacts');
}