<?php

// DANS QUEL CAS, ON PEUT CREER DES FONCTIONS POUR SE SIMPLIFIER LE CODE ?
// SI ON DETECTE DES BLOCS DE CODE QUI SE REPETENT A PLUSIEURS ENDROITS DIFFERENTS
// => PENSER A CREER UNE FONCTION
// TYPIQUEMENT, UNE FONCTION PEUT SERVIR DE FILTRE
function filtrer($name="id")
{
    $resultat = $_REQUEST[$name] ?? "";
    return $resultat;
}


// JE VAIS RECUPERER L'INFO DE L'IDENTIFIANT DU FORMULAIRE
//         <input type="hidden" name="identifiantFormulaire" value="delete">
// ?? "" => SI LE FORMULAIRE N'A RIEN ENVOYE ALORS ON PREND "" COMME VALEUR PAR DEFAUT
// $identifiantFormulaire = $_REQUEST["identifiantFormulaire"] ?? "";
$identifiantFormulaire = filtrer("identifiantFormulaire");

if ($identifiantFormulaire == "update")
{
    // ON RECUPERE LES INFOS ENVOYEES PAR LE NAVIGATEUR
    // ET ON VA MODIFIER LA LIGNE CORRESPONDANTE DANS LA TABLE articles

    $tabAssoColonneValeur = [
        "id"               => filtrer("id"),
        "titre"            => filtrer("titre"),
        "contenu"          => filtrer("contenu"),
        "image"            => filtrer("image"),
        "datePublication"  => filtrer("datePublication"),
        "categorie"        => filtrer("categorie"),
    ];
    // ON UTILISE CE RACCOURCI POUR CREER DES VARIABLES A PARTIR DES CLES DU TABLEAU ASSOCIATIF
    extract($tabAssoColonneValeur);

    // PHP DOIT VERIFIER ET VALIDER LES INFOS RECUES
    // => SECURITE EST BASIQUE => A AMELIORER... PLUS TARD
    if ($id != ""                   // ATTENTION: IMPORTANT POUR LE UPDATE
        && $titre != "" 
        && $contenu != ""
        && $image != ""
        && $datePublication != ""
        && $categorie != "")
    {
        // https://sql.sh/cours/update
        $requeteSQL   =
<<<CODESQL

UPDATE articles 
SET 
    titre           = :titre,
    contenu         = :contenu,
    image           = :image,
    datePublication = :datePublication,
    categorie       = :categorie
WHERE 
    id = :id;


CODESQL;


        // ETAPE3: ON VA ENVOYER LA REQUETE SQL 
        // JE CHARGE LE CODE PHP POUR ENVOYER LA REQUETE
        require_once "php/model/envoyer-sql.php";

        // MESSAGE DE CONFIRMATION
        echo "VOTRE ARTICLE A ETE MODIFIE ($requeteSQL)";

    }

}

if ($identifiantFormulaire == "delete")
{
    // CODE DE TRAITEMENT DU FORMULAIRE DE DELETE
    // IL FAIT RECUPERER L'INFO DE L'id DE LA LIGNE A SUPPRIMER

    // ET ENSUITE IL FAUT CONSTRUIRE LA REQUETE SQL 
    // POUR SUPPRIMER LA LIGNE DANS LA TABLE articles
    // ET ENFIN, ON VA ENVOYER LA REQUETE SQL
    $tabAssoColonneValeur = [
        "id"            => filtrer("id"),
    ];
    extract($tabAssoColonneValeur);
    // ON PEUT SE PROTEGER EN PHP
    // EN CONVERTISSANT EN NOMBRE
    // https://www.php.net/manual/fr/function.intval.php
    $id = intval($id);

    if ($id > 0)
    {
        // ON NE PREND PAS LES INFOS DU FORMULAIRE POUR CONCATENER ET CREER LA REQUETE SQL
        // (ATTAQUE PAR INJECTION SQL...)
        $requeteSQL   =
<<<CODESQL

DELETE FROM articles
WHERE id = :id

CODESQL;

        require_once "php/model/envoyer-sql.php";

        // MESSAGE DE CONFIRMATION
        echo "VOTRE ARTICLE A ETE SUPPRIME ($requeteSQL)";

    }
    else
    {
        // MESSAGE DE CONFIRMATION
        echo "MERCI DE NE PAS HAKCER MON SITE...";
    }

}

if ($identifiantFormulaire == "create")
{
    // CODE DE TRAITEMENT DU FORMULAIRE DE CREATE

    // DEBUG
    // echo "JE DOIS TRAITER LE FORMULAIRE";

    // $_REQUEST EST UN TABLEAU ASSOCIATIF

    /*
    // ETAPE1: RECUPERER LES INFOS DU FORMULAIRE
    $titre           = $_REQUEST["titre"];
    $contenu         = $_REQUEST["contenu"];
    $image           = $_REQUEST["image"];
    $datePublication = $_REQUEST["datePublication"];
    $categorie       = $_REQUEST["categorie"];


        // ON PASSE PAR UN TABLEAU SUPPLEMENTAIRE
    // OU ON VA DONNER LES VALEURS EXTERIEURES A MEMORISER
    // SIMPLIFICATION: JE PEUX ENLEVER LES :
    $tabAssoColonneValeur = [
        "titre"            => $titre,
        "contenu"          => $contenu,
        "image"            => $image,
        "datePublication"  => $datePublication,
        "categorie"        => $categorie,
    ];
    */

    // CONSEIL: UTILISER LES MEMES NOMS PARTOUT
    // "nom de la colonne SQL" => $_REQUEST["attribut name HTML"]
    
    $tabAssoColonneValeur = [
        "titre"            => filtrer("titre"),
        "contenu"          => filtrer("contenu"),
        "image"            => filtrer("image"),
        "datePublication"  => filtrer("datePublication"),
        "categorie"        => filtrer("categorie"),
    ];
    // RACCOURCI POUR CREER LES VARIABLES A PARTIR DU TABLEAU ASSOCIATIF
    extract($tabAssoColonneValeur);

    // IL FAUT RAJOUTER DE LA SECURITE
    // POUR VALIDER QUE TOUTES LES INFOS NECESSAIRES SONT PRESENTES
    if ($titre != "" 
            && $contenu != ""
            && $image != ""
            && $datePublication != ""
            && $categorie != "")
    {
        // SCENARIO OK
        // ETAPE2: ON VA CONSTRUIRE LA REQUETE SQL INSERT
        // POUR SE PROTEGER, ON NE VA PAS CONCATENER AVEC DES ELEMENTS EXTERIEURS
        // ON PREPARE LE CODE SQL ET PLUS TARD ON VA L'EXECUTER
        $requeteSQL   =
<<<CODESQL

INSERT INTO articles
( titre, contenu, image, datePublication, categorie)
VALUES
( :titre, :contenu, :image, :datePublication, :categorie) 

CODESQL;


        // ETAPE3: ON VA ENVOYER LA REQUETE SQL 
        // JE CHARGE LE CODE PHP POUR ENVOYER LA REQUETE
        require_once "php/model/envoyer-sql.php";

        // MESSAGE DE CONFIRMATION
        echo "VOTRE ARTICLE A ETE PUBLIE ($requeteSQL)";
    }
    else
    {
        // SCENARIO KO
        // MESSAGE DE CONFIRMATION
        echo "VEUILLEZ REMPLIR TOUS LES CHAMPS OBLIGATOIRES";
    }

}


_______________________________________________________________________________________________________

<section>
    <h2>FORMULAIRE DE CREATION DARTICLE</h2>
    <form id="create" class="admin" action="" method="POST">
        <input type="text" name="titre" required placeholder="entrer le titre">
        <textarea name="contenu" cols="60" rows="8" required placeholder="entrer le contenu"></textarea>
        <!-- POUR LIMAGE, ON DEVRAIT PROPOSER UN UPLOAD => PLUS TARD... -->
        <input type="text" name="image" required value="assets/img/photo1.jpg">
        <!-- https://www.php.net/manual/fr/function.date.php -->
        <input type="text" name="datePublication" value="<?php echo date("Y-m-d H:i:s") ?>">
        <input type="text" name="categorie" required placeholder="entrez la catégorie">
        <!--
        <input type="text" style="display:none;" name="identifiantFormulaire" value="create" readonly>
        -->
        <input type="hidden" name="identifiantFormulaire" value="create">

        <button type="submit">PUBLIER LARTICLE</button>
        <div class="confirmation">
            <?php 
$identifiantFormulaire = $_REQUEST["identifiantFormulaire"] ?? "";
if ($identifiantFormulaire == "create")
{
    require "php/controller/form-articles.php"; 
}        
            ?>
        </div>
    </form>
</section>


<section class="updateSection cache">
    <button class="closePopup">fermer la popup</button>
    <h2>FORMULAIRE POUR MODIFIER UN ARTICLE (UPDATE)</h2>
    <form id="update" class="admin" action="" method="POST">
        <div class="infosUpdate">
            <input type="text" name="titre" required placeholder="entrer le titre">
            <textarea name="contenu" cols="60" rows="8" required placeholder="entrer le contenu"></textarea>
            <!-- POUR LIMAGE, ON DEVRAIT PROPOSER UN UPLOAD => PLUS TARD... -->
            <input type="text" name="image" required value="assets/img/photo1.jpg">
            <!-- https://www.php.net/manual/fr/function.date.php -->
            <input type="text" name="datePublication" value="<?php echo date("Y-m-d H:i:s") ?>">
            <input type="text" name="categorie" required placeholder="entrez la catégorie">
            <!-- POUR LE UPDATE ON DOIT SAVOIR QUELLE LIGNE ON VEUT MODIFIER -->
            <input type="text" name="id" required placeholder="entrez id ligne">
        </div>

        <!-- PARTIE TECHNIQUE POUR SAVOIR QUEL EST LE FORMULAIRE A TRAITER POUR LE SERVEUR -->
        <input type="hidden" name="identifiantFormulaire" value="update">
        <button type="submit">MODIFIER LARTICLE</button>
        <div class="confirmation">
        <?php 
$identifiantFormulaire = $_REQUEST["identifiantFormulaire"] ?? "";
if ($identifiantFormulaire == "update")
{
    require "php/controller/form-articles.php"; 
}        
            ?>
        </div>

    </form>
</section>

<section class="cache">
    <h2>FORMULAIRE DE DELETE</h2>
    <form id="delete" action="" method="POST">
        <input type="text" name="id" required placeholder="entrez id">
        <!-- CODE BARRE TECHNIQUE POUR DISTINGUER LES FORMULAIRES -->
        <input type="hidden" name="identifiantFormulaire" value="delete">
        <button>SUPPRIMER LA LIGNE</button>
        <div class="confirmation">
        <?php 
$identifiantFormulaire = $_REQUEST["identifiantFormulaire"] ?? "";
if ($identifiantFormulaire == "delete")
{
    require "php/controller/form-articles.php"; 
}        
            ?>
        </div>
    </form>    
</section>


<section>
    <h2>LISTE DES ARTICLES</h2>

    <table>
        <thead>
            <!-- TITRE DES COLONNES -->
            <!-- LIGNE => TABLE ROW => tr -->
            <tr>
                <td>id</td>
                <td>titre</td>
                <td>contenu</td>
                <td>image</td>
                <td>categorie</td>
                <td>modifier</td>
                <td>supprimer</td>
            </tr>
        </thead>
        <tbody>
            <!-- LIGNES -->
            <?php

$requeteSQL =
<<<CODESQL

SELECT * FROM `articles`
ORDER BY datePublication DESC

CODESQL;


$tabAssoColonneValeur = [];

// JE CHARGE LE CODE PHP POUR ENVOYER LA REQUETE
require "php/model/envoyer-sql.php";

// ETAPE3: JE RECUPERE MON TABLEAU DE RESULTATS
// https://www.php.net/manual/fr/pdostatement.fetchall.php
$tabLigne = $pdoStatement->fetchAll();

// ON FAIT UNE BOUCLE POUR AFFICHER CHAQUE ARTICLE
foreach($tabLigne as $tabAsso)
{
    /*
    $id         = $tabAsso["id"];
    $titre      = $tabAsso["titre"];
    $contenu    = $tabAsso["contenu"];
    $image      = $tabAsso["image"];
    $categorie  = $tabAsso["categorie"];
    */
    // SIMPLIFICATION
    // https://www.php.net/manual/fr/function.extract.php
    // extract CREE DES VARIABLES A PARTIR DES CLES DU TABLEAU ASSOCIATIF
    extract($tabAsso); 

    echo
<<<CODEHTML

<tr>
    <td>$id</td>
    <td>$titre</td>
    <td>$contenu</td>
    <td>$image</td>
    <td>$categorie</td>
    <td>
        <button data-id="$id" class="update">modifier</button>
        <!-- ON PEUT DONNER PLUSIEURS CLASSES A UNE BALISE -->
        <div class="infosUpdate cache">
            <input type="text" name="titre" required placeholder="entrer le titre" value="$titre">
            <textarea name="contenu" cols="60" rows="8" required placeholder="entrer le contenu">$contenu</textarea>
            <!-- POUR L'IMAGE, ON DEVRAIT PROPOSER UN UPLOAD => PLUS TARD... -->
            <input type="text" name="image" required value="$image">
            <!-- https://www.php.net/manual/fr/function.date.php -->
            <input type="text" name="datePublication" value="$datePublication">
            <input type="text" name="categorie" required placeholder="entrez la catégorie" value="$categorie">
            <!-- POUR LE UPDATE ON DOIT SAVOIR QUELLE LIGNE ON VEUT MODIFIER -->
            <input type="text" name="id" required placeholder="entrez id ligne" value="$id">
        </div>

    </td>  
    <td><button data-id="$id" class="delete">supprimer</button></td>  
</tr>

CODEHTML;
}


?>
        </tbody>
    </table>
</section>


<script>
// JE VAIS RAJOUTER DU CODE 

// QUAND LE CLIENT VA CLIQUER SUR LE BOUTON "fermer la popup"
// ON VA RAJOUTER LA CLASSE cache A LA SECTION updateSection
var boutonClose = document.querySelector("button.closePopup");
boutonClose.addEventListener("click", function(){
    var baliseSectionUpdate = document.querySelector("section.updateSection");
    baliseSectionUpdate.classList.add("cache");
});

// QUAND LE CLIENT VA CLIQUER SUR LE BOUTON update
// ON VA COPIER LE CODE HTML DU FORMULAIRE PREREMPLI
// A LA PLACE DU FORMULAIRE DE UPDATE (VIDE)
var listeBoutonUpdate = document.querySelectorAll("button.update");
// BOUCLE EN JS SUR CHAQUE BOUTON
listeBoutonUpdate.forEach(function(bouton){
    // ON VA ACTIVER DU CODE JS SUR LE CLICK
    bouton.addEventListener("click", function(event){
        // DEBUG
        console.log("CLICK SUR UN BOUTON modifier");
        // ON VEUT RECOPIER LE CODE HTML DU FORMULAIRE PRE-REMPLI
        // A LA PLACE DU FORMULAIRE UPDATE VIDE
        var baliseBouton = event.target;
        var baliseTd = baliseBouton.parentNode;
        var baliseUpdate = baliseTd.querySelector(".infosUpdate");

        // DEBUG
        console.log(baliseBouton);
        console.log(baliseTd);
        console.log(baliseUpdate);

        // IL FAUT COPIER CE CODE HTML POUR REMPLACER LE FORMULAIRE VIDE
        // baliseUpdate.innerHTML;
        // JE VEUX AGIR SUR LE FORMULAIRE ET LA DIV class="infosUpdate"
        var baliseUpdateForm = document.querySelector("form#update div.infosUpdate");
        // ON COPIE LE CODE HTML D'UNE BALISE A UNE AUTRE
        baliseUpdateForm.innerHTML = baliseUpdate.innerHTML;

        // ET MAINTENANT, ON DOIT AUSSI AFFICHER LA SECTION
        // => SUR LA BALISE section JE VAIS ENLEVER LA CLASSE cache
        var baliseSection = document.querySelector(".updateSection");
        baliseSection.classList.remove("cache"); // ATTENTION, PAS DE . POUR LA CLASSE
    });

});



// QUAND LE CLIENT VA CLIQUER SUR LE BOUTON supprimer    
var listeBoutonDelete = document.querySelectorAll("button.delete");
// SUR CHAQUE BOUTON, JE VAIS AJOUTER UN EVENT LISTENER SUR LE CLICK
// => BOUCLE (forEach EN JS EST DIFFERENT DU foreach PHP...)
listeBoutonDelete.forEach(function(bouton){
    // DEBUG
    // console.log(bouton);
    // SUR CHAQUE BOUTON, ON AJOUTE UN EVENT LISTENER SUR LE CLICK
    bouton.addEventListener("click", function(event){
        console.log("TU AS CLIQUE");
        // JE VOUDRAIS RECOPIER L'id DE LA LIGNE DANS LE FORMULAIRE DE DELETE
        // JA VAIS RECUPERER L'ATTRIBUT data-id SUR LE BOUTON
        var idBouton = event.target.getAttribute("data-id");
        console.log(idBouton);
        // MAINTENANT, JE VAIS COPIER LA VALEUR DANS LE CHAMP DU FORMULAIRE
        var champId = document.querySelector("form#delete input[name=id]");
        //console.log(champId);
        // JE DOIS CHANGER LA VALEUR DU CHAMP DU FORMULAIRE
        champId.value = idBouton;

        // ON PEUT FAIRE PLUS COMPLIQUE QUE LA POPUP...
        var confirmation = window.confirm("ES TU SUR DE CE QUE TU FAIS");
        if (confirmation)
        {
            // ON VA DECLENCHER LE FORMULAIRE DE DELETE DIRECTEMENT
            var formDelete = document.querySelector("form#delete");
            // JE DECLENCHE L'ENVOI DU FORMULAIRE SANS QUE LE CLIENT AIT CLIQUE
            formDelete.submit();
        }
        else
        {
            // ON NE FAIT RIEN
        }
    });

});



</script>



