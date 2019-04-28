  <div class="text-center">
    <p style="color: black; font-size:50px;">MES RESERVATIONS</p>
    <form method="post" action="exportcsv">
      <!-- <i class="fa fa-download"/> -->
      <input type="submit" class="btn btn-success" name="download" value="Exporter le fichier csv"/>
    </form>
    <hr/>
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
            <th scope="col" style="text-align: center;" >Ecourter</th>
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
                <td style="background-color:#5bc0de;">
                <?php $cur = $reservation->getMyCurrentReserv($_SESSION['id_u'])->fetchAll();
                  foreach($cur as $v => $c){
                    if($reservation->getMyCurrentReserv($_SESSION['id_u'])->rowCount() >= 1  && $c['id_r'] == $r['id_r']){
                        ?><input type="submit" name ="ecourter" style=" color: white; " class="btn btn-warning" value="Ecourter"/><?php
                    }
                  }?>
                </td>
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
