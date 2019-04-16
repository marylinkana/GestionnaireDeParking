<?php
class File{

  public function __construct(){
  }

  public function insertIntoFile($id_u)
  {
    global $bdd;
    $maxRang = $bdd->query("SELECT MAX(rang) FROM users");
    $maxRang = $maxRang->fetch();
    $maxRang = $maxRang['MAX(rang)'] + 1;
    $req = $bdd->prepare("UPDATE users SET rang = $maxRang WHERE id_u = :id_u");
    $req->bindValue(':id_u', $id_u,  PDO::PARAM_INT);
    $req->execute();
    header('Location:accueil');
    return $req->fetch();
  }

  public function outOfFile()
  {
    global $bdd;
    $newFreePlace = $place->newFreePlace();
    while($newFreePlace = $newFreePlace->fetch()){
      $fileHead = getFileHead();
      reserver($newFreePlace['id_pl'], $fileHead['id_u']);
      resetRang($fileHead['id_u']);
      changeRang();
    }
    return $newFreePlace;
  }

  public function getFileList()
  {
      global $bdd;
      $req = $bdd->query("SELECT * FROM users WHERE rang > 0 ORDER BY rang ASC");
      return $req;
  }

  public function getFileHead()
  {
    global $bdd;
    $wetter = $bdd->query("SELECT * FROM users WHERE rang = 1");
    return $wetter->fetch();
  }
}
?>
