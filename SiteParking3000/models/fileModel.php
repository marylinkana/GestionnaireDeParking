<?php


class File
{
   
	private $filearray = array();
	private $first = 0;
    private $firstFree = 0;
    
    
    /* public function __construct($taille){
        //print"Construction de l'instance \n";
         $this->taille = $taille;
    }*/
    
    public function insertInFile($id_u)
	{
		array_push($this->filearray, $id_u);
		$this->firstFree++;
        
	}
    
    public function getFile($indice)
    {
        echo '</Br>';
        return $this->filearray[$indice];
    }
    
    public function getAllFile()
    {
            for($a=0; $a <= $this->getEndFile(); $a++)
        {

           $result = print_r($this->getFile($a));
            $a++;
        }
        return $result;
        
    }
    
    public function getfirstFree()
    {
        return $this->firstFree;
    }
    
    public function getEndFile()
    {
        $result = $this->firstFree -1;
        return $result;
    }
}

require "./connexion.php";

$requete = $bdd->prepare("SELECT id_u from users");
$requete = $requete->execute();



