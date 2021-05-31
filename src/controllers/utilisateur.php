<?php

function verifierPayload(array $data)
{
    if (!isset($data['utilisateur-identifiant']) || $data['utilisateur-identifiant'] === '')
    {
        return "Vous devez spécifier un identifiant";
    }

    if (!isset($data['utilisateur-pwd']) || $data['utilisateur-pwd'] === '')
    {
        return "Vous devez spécifier un mot de passe";
    }
    return null;
}

function cookieGestion($identifiant)
{
    if(isset($_POST['connexion-checkbox'])){
        $expirationUnMois = time()+60*60*24*30;
        setcookie("identifiant", $identifiant, $expirationUnMois);
    }
}

///////////////////////////////////////////////////////////////////////////////////////
function connect()
{
    $messageErreur = null;
    if (isset($_POST['btn-valider-connexion']))
    {
        $messageErreur = verifierPayload($_POST);
        if ($messageErreur === null)
        {
            if(Utilisateur::IDENTIFIANT == $_POST['utilisateur-identifiant'])
            {
                if(Utilisateur::PWD == $_POST['utilisateur-pwd'])
                {
                    $_SESSION['utilisateur'] = Utilisateur::ROLE;
                    cookieGestion(Utilisateur::IDENTIFIANT);
                    onVaRediriger('/accueil');
                }else{
                    $messageErreur= "mauvais mot de passe";
                }
                
            }else{
                $messageErreur= "cet identifiant n'est pas reconnu";
            }
  
        }
    }

    include DOSSIER_VIEWS.'/utilisateur/connexion.html.php';
}

function deconnect()
{
    if(isset($_SESSION['utilisateur']))
    {
        session_destroy ();
        if(isset($_COOKIE['identifiant']))
        {
            setcookie("identifiant",'nothing',1);
        }
    }
    onVaRediriger('/accueil');
}