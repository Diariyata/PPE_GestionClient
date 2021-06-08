<?php
// require permet comme include d'incorporer le contenu d'un autre fichier dans celui-ci
// difference entre include & require
// En cas d'erreur (fichier non trouvé), include provoque un warning et continu l'execution du code, require provoque une erreur fatale et bloque l'execution du code. 
require '../models/bdd.inc.php';
session_start();

$infosClient = infoClient($_GET['id_client']);

if (!$infosClient) { // si $infosClient == false : l'id ne correspond à aucun client, on redirige vers l'index.php
    header('location:../index.php');
    exit();
}

if (
    isset($_POST['id_client'])
    && isset($_POST['nom'])
    && isset($_POST['prenom'])
    && isset($_POST['age'])
    && isset($_POST['email'])
) {
    if ($_POST['nom'] == "" || $_POST['prenom'] == "" || $_POST['age'] == "" || $_POST['email'] == "") {
        echo '<p class="alert-danger">Veuillez remplir tous les champs</p>';
     } elseif (is_numeric($_POST['nom']) || is_numeric($_POST['prenom']) || is_numeric($_POST['email'])) {
         echo '<p class="alert-danger">Veuillez verifier vos saisie</p>';
     } elseif (!is_numeric($_POST['age']) || ($_POST['age'] < 18 || $_POST['age'] > 99)) {
         echo '<p class="alert-danger">Veuillez verifier l\'âge</p>';
     } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
         echo '<p class="alert-danger">Veuillez verifier la saisie de l\'email</p>';
     } else {

    ModifierClient($_POST['id_client'],$_POST['nom'], $_POST['prenom'], $_POST['age'], $_POST['email']);

    $_SESSION['message'] = '<div class="alert-success">Vos informations ont bien été mise à jour.</div>';
    header('location:../index.php');
    }
}

// DELETE
if(isset($_GET['action']) && $_GET['action'] == 'supprimer' && !empty($_GET['id_client'])) {
    // une valeur dans $_GET et $_POST est toujours de type string !!!
    SupprimerClient($_GET['id_client']);

    $_SESSION['message'] = '<div class="alert-danger">Vos informations ont bien été supprimés.</div>';
    header('location:../index.php');
}

include '../vues/modifier.php';
