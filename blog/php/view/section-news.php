<section>
    <h2>liste des articles html </h2>
    <div class="listeArticle">
        <article>
            <img src="assets/img/polanski.jpg" alt="photo1">
            <h3>Pour ou contre Polanski ?</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident praesentium ea illum alias molestiae iste suscipit unde aliquam dolorum harum placeat ipsa cum, nihil neque rem voluptas dignissimos reiciendis totam?</p>
        </article>
        <article>
            <img src="assets/img/corona.jpg" alt="photo1">
            <h3>Coronavirus en approche ?</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident praesentium ea illum alias molestiae iste suscipit unde aliquam dolorum harum placeat ipsa cum, nihil neque rem voluptas dignissimos reiciendis totam?</p>
        </article>
        <article>
            <img src="assets/img/fashion.jpg" alt="photo1">
            <h3>Pluie de stars à la fashion-week</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident praesentium ea illum alias molestiae iste suscipit unde aliquam dolorum harum placeat ipsa cum, nihil neque rem voluptas dignissimos reiciendis totam?</p>
        </article>
    </div>
</section>

<section>
    <h2>liste des articles php</h2>
    <div class="listeArticle">

<?php

$pdo = new PDO("mysql:host=localhost;dbname=blog;charset=utf8;", "root", "");

$requeteSQL =
<<<CODESQL

SELECT * FROM `articles`

CODESQL;

$tabAssoColonneValeur = [];

require_once "php/model/envoyer-sql.php";

$tabLigne = $pdoStatement->fetchAll();

foreach($tabLigne as $tabAsso)
{
    extract($tabAsso); 
    echo
<<<CODEHTML

    <article class="$categorie">
        <img src="$image" alt="photo">
        <h3>$titre</h3>
        <p>$contenu</p>
    </article>

CODEHTML;
}

?>
    </div>
    </section>