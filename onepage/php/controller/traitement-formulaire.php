<?php
    $nbInfo = count($_REQUEST);
    if ($nbInfo > 0)
    {
    
    $nom     = $_REQUEST["nom"];
    $nom     = $_REQUEST["prenom"];
    $email   = $_REQUEST["email"];
    $message = $_REQUEST["message"];
    // mail("client@sonmail.fr", "vous avez un message de $nom", $message);

    $messageStocke =
    <<<texte

    nom:   $nom
    email: $email
    message: $message

    texte;

    file_put_contents("php/model/contact.txt", $messageStocke, FILE_APPEND);
    echo "merci pour votre message $nom ($email). Nous vous recontacterons.";
    }
?>