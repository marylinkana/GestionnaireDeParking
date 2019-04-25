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
    $req = $bdd->prepare("UPDATE users SET rang = :maxRang WHERE id_u = :id_u");
    $req->bindValue(':maxRang', $maxRang,  PDO::PARAM_INT);
    $req->bindValue(':id_u', $id_u,  PDO::PARAM_INT);
    $req->execute();
    var_dump($req->execute());
  //  header('Location:accueil');
    return $req->fetch();
  }

  public function outOfFile()
  {
    global $bdd;
    $newFreePlace = $place->getListPlacesDispo();
    while($newFreePlace = $newFreePlace->fetch()){
      $fileHead = getFileHead();
      $reservation->reserver($newFreePlace['id_pl'], $fileHead['id_u']);
      $user->resetRang($fileHead['id_u']);
      $user->changeRang();
    }
  }

  public function deplacer($rang)
  {
      global $bdd;
      $rangMoinsUn = $rang-1;
      $rangPlusUn = $rang+1;
      $rangProvisoir = 100;
      $rep = $bdd->prepare("UPDATE users SET rang = $rangProvisoir WHERE rang = '".$rang."' ORDER BY rang ASC");
      $rep->execute();
      $rep = $bdd->prepare("UPDATE users SET rang = $rang WHERE rang != 0 AND rang = '".$rangMoinsUn."'  ORDER BY rang ASC");
      $rep->execute();
      $rep = $bdd->prepare("UPDATE users SET rang = $rangMoinsUn WHERE rang = '".$rangProvisoir."'  ORDER BY rang ASC");
      $rep->execute();

      header('location:file');
      return $rep;
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
