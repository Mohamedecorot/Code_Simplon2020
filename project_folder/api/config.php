<?php

//partie DSN : driver, host, nom bdd, encodage caractères
const DSN = 'mysql:host=localhost;dbname=todolist;charset=utf8';
//nom user mysql
const USERNAME = "root";
//mdp user mysql
const PWD = "";

//option PDO
const OPTIONS = [
    // on définit l'option d'affichage des résultats PDS sous la forme d'un tableau associatif
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // on spécifie qu'on veut récuperer les exceptions éventuelles
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];