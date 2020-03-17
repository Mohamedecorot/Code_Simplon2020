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
    <h2>LISTE DES MESSAGES</h2>
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
ORDER BY message DESC

CODESQL;


$tabAssoColonneValeur = [];
require "fonctionrequeteSQL.php";      // Je charge le code PHP pour envoyer la requete 
$tabLigne = $pdoStatement->fetchAll(); // Je recupère mon tableau de resultat

$sql = 'SELECT * FROM contact';
$req = $pdo->query($sql);
while($row = $req->fetch()) {
//echo $row['nom'].$row['email'].$row['message'].'<br/>';
    $id = $row['id'];
    $nom = $row['nom'];
    $email = $row['email'];
    $message = $row['message'];
    echo
<<<CODEHTML
    <tr>
        <td>$id</td> 
        <td>$nom</td>
        <td>$email</td>
        <td>$message</td>
    </tr> 
CODEHTML;

}
$req->closeCursor();

?>
        </tbody>
    </table>
</section>


</body>
</html>