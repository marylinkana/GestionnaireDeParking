<?php

session_start();

  //  try  {
    //    $bdd = new PDO("mysql:host=localhost;dbname=parking3000;charset=uf8","root","");
     //   }
     //   catch(Exception $e)
     //   {
      //      die ("erreur de bdd non trouvée cherche mieux");
     //   }


if(!isset($_GET['p']) || $_GET['p'] == "")
        {

            $page = "accueil";
            
        }

else
        {
            if(!file_exists("controllers/".$_GET['p']."Controller.php"))
                $page = "404";
            else
                $page = $_GET['p'];
               
        }

        ob_start();
        include "controllers/".$page."Controller.php";
        $content = ob_get_contents();
        ob_end_clean();
	
	include "layout.php";
?>