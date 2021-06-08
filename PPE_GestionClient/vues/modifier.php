<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <title>Maison des ligues</title>
  </head>
  <body>
    <header>
      <h1><i></i> Maison des ligues : Interface admin</h1>
    </header>

<main>
<form action="#" method="POST">
    <a href="../index.php">Voir la liste des utilisateurs</a>
    <input type="hidden" name="id_client" value="<?= $infosClient['id_client']?>">

    <label for="nom">Nom:</label>
    <input type="text" name="nom" id="nom" value="<?= $infosClient['nom'] ?>" autofocus>

    <label for="prenom">Prénom:</label>
    <input type="text" name="prenom" id="prenom" value="<?= $infosClient['prenom']?>">

    <label for="age">Âge:</label>
    <input type="text" name="age" id="age" value="<?= $infosClient['age'] ?>">

    <label for="email">Adresse mail:</label>
    <input type="email" name="email" id="email" value="<?= $infosClient['email'] ?>">

    <button type="submit">Mettre à jour <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fafafa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></button>
</form>

    <p>
    <a class="delete" href="?action=supprimer&id_client=<?=$infosClient['id_client']?>">Supprimer X</a>
    </p>
</main>