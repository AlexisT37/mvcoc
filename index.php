   <?php


   //the require statement is used to include another file
   // it actually takes all the variables from this files and sends them to required file
   //the difference between require and include is that require stops the script if the file is not found

   require('src/model.php');
   //ve call the function required in model.php
   $posts = getPosts();
   require('templates/homepage.php');
   ?>



