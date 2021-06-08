<?php
// require permet comme include d'incorporer le contenu d'un autre fichier dans celui-ci
// difference entre include & require
// En cas d'erreur (fichier non trouvé), include provoque un warning et continu l'execution du code, require provoque une erreur fatale et bloque l'execution du code. 
require 'models/bdd.inc.php';
session_start();


// echo '<pre>'; print_r($listeClient); echo '</pre>';
$listeClient = listeClients();

$messageSession = '';
if (!empty($_SESSION['message'])) {
    // si le message n'est pas vide on l'affiche
    $messageSession = $_SESSION['message'];
    // on recupere le message et on le supprime de la session pour ne pas le reafficher 
    // pour supprimer un element d'un tableau array : unset
    unset($_SESSION['message']);
}

// DELETE
if(isset($_GET['action']) && $_GET['action'] == 'supprimer' && !empty($_GET['id_client'])) {
    // une valeur dans $_GET et $_POST est toujours de type string !!!
    SupprimerClient($_GET['id_client']);

    $_SESSION['message'] = '<div class="alert-danger">Vos informations ont bien été supprimés.</div>';
    header('location:index.php');
}

include 'vues/home.php';
