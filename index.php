<?php
//require once checks if the file has been included before as well as if the file has been included before in the same scope
require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');


//checks for the correct id and if it is a number
if (isset($_GET['action']) && $_GET['action'] !== '') {
   if ($_GET['action'] === 'post') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
         $identifier = $_GET['id'];

         //uses the post controller to get the post with the id
         post($identifier);
      } else {
         echo 'Erreur : aucun identifiant de billet envoyé';

         die;
      }
   } else {
      echo "Erreur 404 : la page que vous recherchez n'existe pas.";
   }
} else {
   //we use the homepage if there is no action, and post if there is an action
   homepage();
}
