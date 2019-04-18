<div id="accueil">
<?php
if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true){?>
  <div class="text-center">
    <p style="color: black; font-size:50px;">MES RESERVATIONS</p>
     <?php
     $req = $reservation->getMyReservList($_SESSION['id_u'])->fetchAll();
     if($reservation->getMyReservList($_SESSION['id_u'])->rowCount() >= 1){
       ?>
       <table class="table table-bordered bordered-dark" style="border:1px solid black;">
        <thead class="" style="background-color:black;">
          <tr style="text-align: center;">
            <th scope="col" style="text-align: center;" >#</th>
            <th scope="col" style="text-align: center;" >Nom</th>
            <th scope="col" style="text-align: center;" >Place</th>
            <th scope="col" style="text-align: center;" >Debut</th>
            <th scope="col" style="text-align: center;" >Fin</th>
              <?php if($reservation->getMyCurrentReserv($_SESSION['id_u'])->rowCount() >= 1){
                ?><th scope="col" style="text-align: center;" >Ecourter</th><?php
              }?>
          </tr>
        </thead> <?php
       foreach($req as $v => $r){ ?>
         <form action="accueil" method="post">
           <input type="hidden" name ="id_r" style=" color: white; " class="btn btn-info" value="<?= $r['id_r'] ?>"/>
           <input type="hidden" name ="id_p" style=" color: white; " class="btn btn-info" value="<?= $r['id_p'] ?>"/>
           <input type="hidden" name ="date_d" style=" color: white; " class="btn btn-info" value="<?= $r['dateDebut'] ?>"/>
           <input type="hidden" name ="date_f" style=" color: white; " class="btn btn-info" value="<?= $r['dateFin'] ?>"/>
           <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
            <tbody style="border:1px solid black" >
              <tr style="border:1px solid black">
                <th scope="row" style="text-align: center; background-color:#5bc0de;"><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
                <td style="background-color:#5bc0de;"><input type="button" name ="nom_u" style=" color: white; " class="btn btn-info" value="<?=$r['nom_u']?>"/></td>
                <td style="background-color:#5bc0de;"><input type="button" name ="nom_p" style=" color: white; " class="btn btn-info" value="<?=$r['nom_p']?>"/></td>
                <td style="background-color:#5bc0de;"><input type="button" name ="date_d" style=" color: white; " class="btn btn-info" value="<?=$r['dateDebut']?>"/></td>
                <td style="background-color:#5bc0de;"><input type="button" name ="date_f" style=" color: white; " class="btn btn-info" value="<?=$r['dateFin']?>"/></td>
                <?php $cur = $reservation->getMyCurrentReserv($_SESSION['id_u'])->fetchAll();
                  foreach($cur as $v => $c){
                    if($reservation->getMyCurrentReserv($_SESSION['id_u'])->rowCount() >= 1  && $c['id_r'] == $r['id_r']){
                        ?><td style="background-color:#5bc0de;"><input type="submit" name ="ecourter" style=" color: white; " class="btn btn-warning" value="Ecourter"/></td><?php
                    }
                  }?>
        </form>
      <?php } ?>
               </tr>
             </tbody>
           </table> <?php
   }
   else{echo "<p class='btn btn-warning'><b> Vous n'avez pas encore fait de réservations !</b></p>";}?>
   <br>
   <br>
  </div>

  <div class="text-center">
      <p style="color: black; font-size:50px;">PLACES DISPONIBLES</p>
       <?php
        $req = $place->getListPlacesDispo()->fetchAll();
        ?>
        <table class="table table-bordered bordered-dark" style="border:1px solid black;">
         <thead class="" style="background-color:black;">
           <tr style="text-align: center;">
             <th scope="col" style="text-align: center;" >#</th>
             <th scope="col" style="text-align: center;" >Places</th>
             <th scope="col" style="text-align: center;" >Réserver</th>
           </tr>
         </thead> <?php
        foreach($req as $v => $r){ ?>
          <form action="accueil" method="post">
            <input type="hidden" name ="id_p" style=" color: white; " class="btn btn-info" value="<?= $r['id_p'] ?> "/>
            <tbody style="border:1px solid black" >
              <tr style="border:1px solid black">
                <th scope="row" style="text-align: center; background-color:#5bc0de;" ><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
                <td style="background-color:#5bc0de;"><input type="button" name ="nom_p" style=" color: white; " class="btn btn-info" value="<?=$r['nom_p']?>"/></td>
                <td style="background-color:#5bc0de;"><input type="submit" name ="reserver" style=" color: white; " class="btn btn-success" value="Reserver"/></td>
         </form>
       <?php } ?>
              </tr>
            </tbody>
          </table> <?php
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
