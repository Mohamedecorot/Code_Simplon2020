<?php

function filtrer($name="id")
{
    $resultat = $_REQUEST[$name] ?? "";
    return $resultat;
}

// CREATE

if ($identifiantFormulaire == "create")
{
    
    $tabAssoColonneValeur = [
        "nom"            => filtrer("nom"),
        "email"          => filtrer("email"),
        "message"        => filtrer("message"),
    ];
    
    // Raccourci pour creer les variables à partir du tableau associatif 
    extract($tabAssoColonneValeur);

    // Sécurité pour valider que toutes les infos necéssaires sont présentes
    if ($nom != "" 
        && $email != ""
        && $message != "")
    {
        //on crée le code SQL pour inserer une ligne dans la table SQL 
        $requeteSQL   =
<<<CODESQL

INSERT INTO contact
( nom, email, message)
VALUES
( :nom, :email, :message) 

CODESQL;

        //On va envoyer la requete SQL
        require_once "fonctionrequeteSQL.php";

        //Message de confirmation
        echo "Votre article a été publié ($requeteSQL)";
    }
    else
    {
        echo "VEUILLEZ REMPLIR TOUS LES CHAMPS OBLIGATOIRES S'IL VOUS PLAIT !!!";
    }

}
