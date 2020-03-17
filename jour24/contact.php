<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>contact</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<!-- CREATE -->

<section id="contact">
    <h2>Formulaire de contact</h2>
    <form id="create" action="#section-contact" method="POST">
        <input type="text" name="nom" placeholder="entrez votre nom">
        <input type="email" name="email" placeholder="entrez email">
        <textarea name="message" cols="60" rows="6" placeholder="entrez votre message"></textarea>
        <!-- cette ligne permet de donner un identifiant invisible au formulaire -->
        <input type="hidden" name="identifiantFormulaire" value="create">
        <button type="submit">envoyer votre message</button>
        <div class="confirmation">
            <?php 
                $identifiantFormulaire = $_REQUEST["identifiantFormulaire"] ?? "";
                if ($identifiantFormulaire == "create")
                {
                    require "filtreformulaire.php"; 
                }                        
            ?>
        </div>
    </form>
</section>

<!-- READ -->

<section>
    <h2>LISTE DES ARTICLES</h2>
    <table>
        <thead>                     <!-- TITRE DES COLONNES -->
            <tr>                    <!-- LIGNE => TABLE ROW => tr -->
                <td>id</td>
                <td>nom</td>
                <td>email</td>
                <td>message</td>
            </tr>
        </thead>
        <tbody>                     <!-- LIGNES -->    
            <?php

$requeteSQL =
<<<CODESQL

SELECT * FROM `contact`
ORDER BY datePublication DESC

CODESQL;


//$tabAssoColonneValeur = [];
require "fonctionrequeteSQL.php";      // Je charge le code PHP pour envoyer la requete 
$tabLigne = $pdoStatement->fetchAll(); // Je recupère mon tableau de resultat

foreach($tabLigne as $tabAsso)
{
    extract($tabAsso); 
    echo
<<<CODEHTML

    <tr>
    <td>$id</td> 
    <td>$nom</td>
    <td>$mail</td>
    <td>$message</td>
    <td> 
        <button data-id="$id" class="update">modifier</button>
        <!-- ON PEUT DONNER PLUSIEURS CLASSES A UNE BALISE -->
        <div class="infosUpdate cache">
            <input type="text" name="nom" required placeholder="entrer le nom" value="$nom">
            <input type="mail" name="nom" required placeholder="entrer le mail" value="$mail">
            <textarea name="message" cols="60" rows="8" required placeholder="entrer le message">$message</textarea>
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


</body>
</html>