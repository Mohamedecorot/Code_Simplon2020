
<?php

echo "<h6>Exo1: CREER UNE FONCTION QUI RENVOIE LE PLUS PETIT ENTRE 2 NOMBRES";

function comparer($number1, $number2)
{
    if ($number1 < $number2)
        {$petit = $number1;}
    else 
        {$petit = $number2;}
    return $petit;
}

$petit = comparer(2, 0);
echo "<h4>LE PLUS PETIT NOMBRE EST $petit</h4>";

echo "<h6>Exo2: CREER UNE FONCTION QUI RENVOIE LE PLUS PETIT ENTRE 3 NOMBRES RECUS EN PARAMETRES</h6>";

function comparer3($number1, $number2, $number3)
{
    if ($number1 < $number2 && $number1 < $number3)
        {$petit = $number1;}
    else if ($number2 < $number3)
        {$petit = $number2;}
    else {$petit = $number3;}
    return $petit;
}

$petit = comparer3(1, -2, 8);
echo "<h4>LE PLUS PETIT NOMBRE EST $petit</h4>";

echo "<h6>Exo3: CREER UNE FONCTION QUI RENVOIE LE PLUS PETIT NOMBRE 
DANS UN TABLEAU (FOURNI EN PARAMETRE)</h4>";

function renvoyerPetit ($tableau)
{
    $petit = $tableau[0];
    for ($i=1; $i<count($tableau); $i++)
    {
        if ($petit > $tableau[$i])
            {$petit = $tableau[$i];}
    }
    return $petit;
}

$petit = renvoyerPetit ([ 1, 2, 3, 4 ]);
echo "<h4>LE PLUS PETIT NOMBRE DU TABLEAU EST $petit</h4>";


echo "<h6>Exo4: CREER UNE FONCTION QUI RENVOIE LE PRIX TTC 
A PARTIR DU PRIX HT ET DU TAUX TVA</h4>";

function calculPrixTtc ($prixHt, $Tva=20)
{
    $prixttc = $prixHt * (1 + $Tva/100);
    return $prixttc;
}

$prix = calculPrixTtc (100, 10);
echo "<h4>LE PRIX TTC EST DE $prix</h4>";

echo "<h6>EXO5: CREER UNE FONCTION QUI RENVOIE LA SURFACE DES 4 MURS</h6>";

function calculSurface ($longueur, $largueur, $hauteur)
{
    $surface = 2 * $hauteur * ($longueur + $largueur);
    return $surface;
}

$surface = calculSurface (10, 7, 2.5);
echo "<h4>LE SURFACE DES MURS DE LA SALLE EST {$surface}m2</h4>";


echo "<h6>EXO6: CREER UNE FONCTION QUI RENVOIE LA SOMME DES NOMBRES DANS UN TABLEAU EN PARAMETRE</h6>";

function calculSomme ($tableau)
{
    $somme = 0;
    for ($i=0; $i<count($tableau); $i++)
    {
        $somme = $somme + $tableau[$i];
    }
        return $somme;
}

$sommefinal = calculSomme ([10, 7, 25]);
echo "<h4>LA SOMME DES NOMBRES DANS LE TABLEAU EST $sommefinal </h4>";


echo "<h6>Exo 7: CREER UNE FONCTION QUI COMPTE LE NOMBRE DE VALEURS PAIRS 
DANS UN TABLEAU RECU EN PARAMETRE</h6>";

function compterPaire($tableau)
{
    $somme = 0;
    for ($i=0; $i<count($tableau); $i++)
    {
		   if (($tableau[$i]%2) == 0) 
			 {
            $somme += 1;
		    } 	
    }
    return $somme ;
}

$resultat = compterPaire ([ 1, 2, 3, 4 ]);
echo "<h4>LE NOMBRE DE PAIRE EST DE $resultat</h4>";

echo "<h6>Exo 8: CREER UNE FONCTION concatenerTexte 
QUI CONCATENE LES LETTRES DANS UN TABLEAU (EN PARAMETRE)
ET QUI AJOUTE UNE VIRGULE ENTRE LES LETTRES</h6>";


function concatenerTexte($tableau)
{
    $lettres = "$tableau[0]";
    for ($i=1; $i<count($tableau); $i++)
    {
        $lettres = "$lettres," . "$tableau[$i]";

    }
    return $lettres;
}

$lettres = concatenerTexte([ 'a', 'b', 'c', 'd' ]);
echo "<h4>LES LETTRES SONT '$lettres'</h4>";

echo "<h6>Exo 9: CREER UNE FONCTION calculerPrixTotal QUI RENVOIE LE PRIX TOTAL DU PANIER</h6>";


function calculerPrixTotal($tabQuantite, $tabPrixUnitaire)
{
    $prixFinal = 0;
    for ($i=0; $i<count($tabQuantite); $i++)
    {
        $tabMultiplier[$i] = $tabQuantite[$i] * $tabPrixUnitaire[$i];
        $prixFinal += $tabMultiplier[$i];
    }
    return $prixFinal;
}


$prixfinal = calculerPrixTotal([ 1, 2, 3, 100 ], [ 4, 3, 2, 1 ]);

echo "<h4>LE PRIX TOTAL EST DE $prixfinal</h4>";

echo "<h6>Exo 10: CREER UNE FONCTION creerDeleteSQL QUI RENVOIE LE CODE SQL POUR UN DELETE</h6>";

function creerDeleteSQL ($nomTable, $id)
{
    echo "<h4>DELETE FROM $nomTable WHERE id = $id</h4>";
}

creerDeleteSQL("contact", 5);

echo "<h6>Exo 11: CREER UNE FONCTION creerInsertSQL </h6>";

function creerInsertSQL($nomTable, $tabAssoColVal)
{
    $liste1 = "";
    $liste2 = "";
    $indice = 0;
    foreach ($tabAssoColVal as $cle => $valeur)
        {
            if ($indice == 0)
            {
                $liste1 = $liste1 . $cle;
                $liste2 = $liste2 . ":". $cle;
            }
            else
            {
                $liste1 = $liste1 . ", ". $cle;
                $liste2 = $liste2 . ", :". $cle;
            }
            $indice++;
        }
    $resultat =
<<<CODESQL

INSERT INTO $nomTable
( $liste1 )
VALUES
( $liste2 )

CODESQL;

    return $resultat;
}

$requeteSQLPreparee = creerInsertSQL(
    "newsletter", 
    [ "nom" => "julie", "email" => "julie@nomail.me" ]);

echo "<h4><pre>$requeteSQLPreparee</h4></pre>";