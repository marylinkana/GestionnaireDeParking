<div id="accueil">
<?php
if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true){?>
  <div class="text-center">
    <p style="color: black; font-size:50px;">MES RESERVATIONS</p>
     <?php
     $req = $reservation->getMyReservList($_SESSION['id_u'])->fetchAll();
     if($reservation->getMyReservList($_SESSION['id_u'])->rowCount() >= 1){
       foreach($req as $v => $r){ ?>
         <form action="admin" method="post">
             <input type="hidden" name ="id_r" style=" color: white; " class="btn btn-info" value="<?= $r['id_r'] ?>"/>
             <input type="hidden" name ="id_p" style=" color: white; " class="btn btn-info" value="<?= $r['id_p'] ?>"/>
             <input type="hidden" name ="date_d" style=" color: white; " class="btn btn-info" value="<?= $r['dateDebut'] ?>"/>
             <input type="hidden" name ="date_f" style=" color: white; " class="btn btn-info" value="<?= $r['dateFin'] ?>"/>
             <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
             <input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/>
             <input type="button" name ="nom_u" style=" color: white; " class="btn btn-info" value="<?='Nom : '.$r['nom_u'].
             ' --> Place : '.$r['nom_p'].' --> Debut : '.$r['dateDebut'].' --> Fin : '.$r['dateFin']?>"/>
        </form>
       <?php }
   }
   else{echo "<p class='btn btn-warning'><b> Vous n'avez pas encore fait de réservations !</b></p>";}?>
   <br>
   <br>
  </div>

  <div class="text-center">
      <p style="color: black; font-size:50px;">PLACES DISPONIBLES</p>
       <?php
        $req = $place->getListPlacesDispo()->fetchAll();
        foreach($req as $v => $r){ ?>
          <form action="accueil" method="post">
              <input type="hidden" name ="id_p" style=" color: white; " class="btn btn-info" value="<?= $r['id_p'] ?> "/>
              <?php //var_dump($r['id_p']) ?>
              <input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?> "/>
              <input type="button" name ="nom" style=" color: white; " class="btn btn-info" value="<?='Place : '.$r['nom_p']?> "/>
              <?php //var_dump($r['nom_p']) ?>
              <input type="submit" name ="reserver" style=" color: white; " class="btn btn-danger" value="Reserver"/>
         </form>
         <br>
       <?php }
        if($place->getListPlacesDispo()->rowCount() < 1){
          echo "<p class='btn btn-warning'><b> aucune place n'est disponible pour la moment !</b></p>";
          if($user->getRankUser($_SESSION['id_u'])->rowCount() == 0){ ?>
          <form action="accueil" method="post">
              <input type="submit" name ="attendre" style=" color: white; " class="btn btn-success" value="Intégrer la file d'attente"/>
         </form> <?php }
         $req = $user->getRankUser($_SESSION['id_u'])->fetchAll();
         $nb_wetter = $file->getFileList()->rowCount();
         if($user->getRankUser($_SESSION['id_u'])->rowCount() >= 1){
           foreach($req as $v => $r){ ?>
             <form action="admin" method="post">
                 <input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= 'Rang dans la file d\'attente : '.$r['rang'].'/'.$nb_wetter ?>"/>
            </form>
        <?php } } }?>
  </div>
<?php } ?>
</div>
