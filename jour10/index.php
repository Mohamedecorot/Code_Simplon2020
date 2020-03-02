<?php

    require_once 'php/model/glossaire.php';
    //print_r($glossaire);
   function displayRandomTerm ($array)
        {
            $length = count ($array);
            $index = mt_rand(0, $length - 1);
            //var_dump ($length);
            //var_dump($index);
            //echo '<pre>';
            //print_r($array[$index]);
            //echo '</pre>';
            $titre = $array[$index]["title"];
            $description = $array[$index]["description"];
            $html =
            <<<OUTPUT
                    <button id="refresh" onclick="document.location.reload(false)"> Autre définition </button>
                    <div class=container>
                    <h1>$titre</h1>
                    <p>$description</p>
                    </div>
                    <button> <a</button>
            OUTPUT;

            echo $html;
            //echo "<h1>$titre</h1>";
            //echo "<h2>$description</h2>";
        }
    displayRandomTerm ($glossaire);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Glossaire des termes OPQUAST</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
</body>
</html>