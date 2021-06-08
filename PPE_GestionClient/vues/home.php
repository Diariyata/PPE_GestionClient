<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
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
<table>
<?php
echo $messageSession;
?>
            <thead>
                <tr>
                    <th>Identifiant</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Age</th>
                    <th>Adresse Mail</th>
                </tr>
            </thead>
            <thbody>
                <?php foreach ($listeClient as $Clients) {?>
                <tr>
                <th>
                    <a href="controleurs/modifier.inc.php?action=modifier&id_client=<?=$Clients['id_client']?>"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="black" stroke="#fafafa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>Modifier</a>
                     Ou
                    <a class ="delete" href="./index.php?action=supprimer&id_client=<?=$Clients['id_client']?>">
                    &#10799;Supprimer</a>
                </th>
                <th><?= $Clients['nom'] ?></th>
                <th><?= $Clients['prenom'] ?></th>
                <th><?= $Clients['age'] ?></th>
                <th><?= $Clients['email'] ?></th>
                <?php }?>
                </tr>
            </thbody>        
        </table>

      <a href="controleurs\ajouter.inc.php">+ Ajouter un client</a>

    </main>

    <script>
    let mesBtnDelete = document.querySelectorAll('.delete');
        for (let btn of mesBtnDelete) {
            btn.addEventListener('click', function(e){
                let action = confirm('Voulez-vous vraiment supprimer ce client');
                console.log(action);
                if(!action){
                    e.preventDefault();
                }
            });
        }
    </script>
  </body>