<?php
// require permet comme include d'incorporer le contenu d'un autre fichier dans celui-ci
// difference entre include & require
// En cas d'erreur (fichier non trouvé), include provoque un warning et continu l'execution du code, require provoque une erreur fatale et bloque l'execution du code. 
require '../models/bdd.inc.php';
session_start();


if (
    isset($_POST['nom'])
    && isset($_POST['prenom'])
    && isset($_POST['age'])
    && isset($_POST['email'])
) {
    // controle sur le nom, obligatoire
    // if (empty($_POST['nom'])) {
    //     echo '<div class=""> Attention, le nom du client est obligatoire </div>';
    // } elseif

    if ($_POST['nom'] == "" || $_POST['prenom'] == "" || $_POST['age'] == "" || $_POST['email'] == "") {
       echo '<p class="alert-danger">Veuillez remplir tous les champs</p>';
    } elseif (is_numeric($_POST['nom']) || is_numeric($_POST['prenom']) || is_numeric($_POST['email'])) {
        echo '<p class="alert-danger">Veuillez verifier vos saisie</p>';
    } elseif (!is_numeric($_POST['age']) || ($_POST['age'] < 18 || $_POST['age'] > 99)) {
        echo '<p class="alert-danger">Veuillez verifier l\'âge</p>';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo '<p class="alert-danger">Veuillez verifier la saisie de l\'email</p>';
    } else {

    ajoutClient($_POST['nom'], $_POST['prenom'], $_POST['age'], $_POST['email']);

    $_SESSION['message'] = '<div class="alert-success">Vos informations ont bien été ajoutées.</div>';
    header('location:../index.php');
  }
}

include '../vues/ajout.php';
