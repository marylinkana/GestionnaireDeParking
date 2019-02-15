<?php
require "/models/fileModel.php";

 return $fileattente = new File();

    if($requete)
    {
        $fileattente->insertInFile($requete);
    }

$fileattente->getAllFile();

require "/views/fileView.php";