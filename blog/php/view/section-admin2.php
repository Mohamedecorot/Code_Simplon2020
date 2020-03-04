<section id="section-articles">
    <h2>supprimer un article</h2>
    <form action="#section-articles" method="POST">
    <input type="text" name="titre" required placeholder="entrez le titre de l'article à supprimer">
    <button type="submit">envoyer votre message</button>
    </form>

<?php

if (count($_REQUEST) > 0)
{

    $tabAssoColonneValeur = [
        "titre" => $_REQUEST["titre"],
    ];

    
    $requeteSQL   =
<<<CODESQL

DELETE FROM articles WHERE titre = :titre

CODESQL;

    require_once "php/model/envoyer-sql.php";
    echo "VOTRE ARTICLE A ETE SUPPRIME ($requeteSQL)";
}

?>

</section>
