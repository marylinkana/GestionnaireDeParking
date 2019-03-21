<?php
session_start();
  require 'Modeles/connexion.php';

  // define('WEBROOT', dirname(__FILE__));
  // define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']));
  // define('ROOT', dirname(WEBROOT));
  // define('DS', DIRECTORY_SEPARATOR);
  // define('CORE',ROOT.DS.'core');

if(!isset($_GET['p']) || $_GET['p'] == "")
{
        $page = "accueil";
}
else
{
    if(!file_exists("Controllers/".$_GET['p'].".php"))
        {
            $page = 404;
        }
        else
            $page = $_GET['p'];
    }
    ob_start();//suspend l'affichage
    require "Controllers/".$page.".php";
    $content = ob_get_contents();//recupere ce qui n'a pas ete affiché
    ob_end_clean();//reprend l'affichage

require "layout.php";
?>
