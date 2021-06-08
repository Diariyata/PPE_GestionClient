<?php

function connectToDatabase()
{
    $dsn = 'mysql:dbname=client_ligue;host=localhost';
    $user = 'root';
    $password = '';
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
    );

    $pdo = new PDO($dsn, $user, $password, $options);
    return $pdo;
}

function listeClients()
{
    // connexion a la bdd
    $pdo = connectToDatabase();

    // preparation de la requete :
    $query = $pdo->prepare("
    Select *
    From clients
    ");

    // on execute 
    $query->execute();

    // on renvoie les données
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function ajoutClient($nom, $prenom, $age, $email)
{
    // connexion a la bdd
    $pdo = connectToDatabase();

    // preparation de la requete :
    $query = $pdo->prepare("
    INSERT INTO clients 
    (nom, prenom, age, email) 
    VALUES (?, ?, ?, ?)
    ");

    // on execute 
    $query->execute(
        [
            $nom,
            $prenom,
            $age,
            $email,
        ]
    );
}

// modifier.inc.php : Recuperation des infos du client
function infoClient($id_client){
    // connexion a la bdd
    $pdo = connectToDatabase();

    // preparation de la requete :
    $query = $pdo->prepare("
    Select id_client, nom, prenom, age, email
    From clients
    WHERE id_client = ?
    ");
 
    // on execute 
    $query->execute( [$id_client] );

    // une seule ligne => un fetch()
    return $query->fetch(PDO::FETCH_ASSOC);

}

// modifier.inc.php : modification d'un client
function ModifierClient($id_client, $nom, $prenom, $age, $email){
    // connexion a la bdd
    $pdo = connectToDatabase();

    // preparation de la requete :
    $query = $pdo->prepare("
    UPDATE clients SET
        nom = ?,
        prenom = ?,
        age = ?,
        email = ?
    WHERE id_client = ?
    ");

    // on execute 
    $query->execute(
        [
            $nom, 
            $prenom, 
            $age, 
            $email, 
            $id_client,
        ]
    );
}

// index.php : suppression d'un client
function SupprimerClient($id_client){
    // connexion a la bdd
    $pdo = connectToDatabase();

    // preparation de la requete :
    $query = $pdo->prepare("
    DELETE FROM clients WHERE id_client = ?
    ");

    // on execute 
    $query->execute( [$id_client] );
}