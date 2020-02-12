<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>MonCv</title>
</head>
<body>
    <header>
    <!--<nav>
        <a href="#s0">Informations personnelles</a>
        <a href="#s1">Expériences professionnelles</a>
        <a href="#s2">Diplômes/Formations</a>
        <a href="#s3">Informations complémentaires</a>
        <a href="#s4">Pour me contacter</a>
    </nav> -->
    <nav>
    <?php
        $tableauNav = array("Informations personnelles","Expériences professionnelles","Diplômes/Formations","Informations complémentaires","Pour me contacter");

        echo '<ul>';
        foreach($tableauNav as $key=>$value)
            {
            echo 
            <<<test
            <a href="#s$key">$value</a>
            test;
            }
        echo '</ul>';
    ?>
    </nav>
    </header>
    <main>