<?php

if (count($_REQUEST) > 0)
{

/*      $titre                = $_REQUEST["titre"];
        $datePublication      = $_REQUEST["datePublication"];
        $categorie            = $_REQUEST["categorie"];
        $contenu              = $_REQUEST["contenu"];
        $image                = $_REQUEST["image"];
    
        echo "l'article $titre a bien été posté le $datePublication";
    
       
        $requeteSQL =
    <<<CODESQL
    
    INSERT INTO articles 
    (titre, datePublication, categorie, contenu, image) 
    VALUES 
    ('$titre', '$datePublication', '$categorie', '$contenu', '$image');
    
    CODESQL;
        echo "$requeteSQL";
        $pdo = new PDO("mysql:dbname=blog;host=localhost;charset=utf8;", "root", "" );
        $pdo->exec($requeteSQL);
    } */
    
    
    $tabAssoColonneValeur = [
        "titre"            => $_REQUEST["titre"],
        "contenu"          => $_REQUEST["contenu"],
        "image"            => $_REQUEST["image"],
        "datePublication"  => $_REQUEST["datePublication"],
        "categorie"        => $_REQUEST["categorie"],
    ];

    
    $requeteSQL   =
<<<CODESQL

INSERT INTO articles
( titre, contenu, image, datePublication, categorie)
VALUES
( :titre, :contenu, :image, :datePublication, :categorie) 

CODESQL;

    require_once "php/model/envoyer-sql.php";
    echo "VOTRE ARTICLE A ETE PUBLIE ($requeteSQL)";
}


