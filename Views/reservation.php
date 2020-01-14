<?php //$file->outOfFile();
  if(isset($_SESSION['niveau']) && $_SESSION['niveau'] == 2){?>

      <div id="resv" class="text-center" style="display:block">
        <p style="color: black; font-size:50px;">RESERVATIONS</p>
        <form method="post" action="exportcsv">
          <!-- <i class="fa fa-download"/> -->
          <input type="submit" class="btn btn-success" name="download" value="Exporter le fichier csv"/>
        </form>
        <hr/>
        <form action="reservation" method="post">
          <input type="text" name ="recherche_resv" style=" color: black; " class="btn btn-secondary" placeholder="recherche" />
          <input type="submit" name ="rechercheResv" style=" color: white; " class="btn btn-success" value="Rechercher"/>
          <input type="submit" name ="encours" style=" color: white; " class="btn btn-success" value="En cours"/>
          <input type="submit" name ="terminee" style=" color: white; " class="btn btn-success" value="Terminée"/>
        </form>
        <hr>



         <?php
         if(isset($rechercheResv)){
           $req = $rechercheResv->fetchAll();
           if($rechercheResv->rowCount() > 0){
             ?>
             <table class="table table-bordered bordered-dark" style="border:1px solid black;">
              <thead class="" style="background-color:black;">
                <tr style="text-align: center;">
                  <th scope="col" style="text-align: center;" >#</th>
                  <th scope="col" style="text-align: center;" >Nom</th>
                  <th scope="col" style="text-align: center;" >Places</th>
                  <th scope="col" style="text-align: center;" >Coûts</th>
                  <th scope="col" style="text-align: center;" >Debut</th>
                  <th scope="col" style="text-align: center;" >Fin</th>
                  <th scope="col" style="text-align: center;" >Modifier</th>
                  <th scope="col" style="text-align: center;" >Ecourter</th>
                  <th scope="col" style="text-align: center;" >Annuler</th>
                </tr>
              </thead> <?php
             foreach($req as $v => $r){ ?>
               <form action="reservation" method="post">
                   <input type="hidden" name ="id_r" style=" color: white; " class="btn btn-info" value="<?= $r['id_r'] ?>"/>
                   <input type="hidden" name ="id_p" style=" color: white; " class="btn btn-info" value="<?= $r['id_p'] ?>"/>
                   <input type="hidden" name ="date_d" style=" color: white; " class="btn btn-info" value="<?= $r['dateDebut'] ?>"/>
                   <input type="hidden" name ="date_f" style=" color: white; " class="btn btn-info" value="<?= $r['dateFin'] ?>"/>
                   <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
                   <tbody style="border:1px solid black" >
                     <tr style="border:1px solid black">
                       <th scope="row" style="text-align: center; background-color:#5bc0de;" ><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
                       <td style="background-color:#5bc0de;"><input type="button" name ="nom_u" style=" color: white; " class="btn btn-info" value="<?= $r['nom_u'] ?>"/></td>
                       <td style="background-color:#5bc0de;"><input type="button" name ="nom_p" style=" color: white; " class="btn btn-info" value="<?= $r['nom_p'] ?>"/></td>
                       <td style="background-color:#5bc0de;"><input type="button" name ="nom_p" style=" color: white; " class="btn btn-info" value="<?= $r['prix'].'€/h' ?>"/></td>
                       <td style="background-color:#5bc0de;"><input type="button" name ="date_d" style=" color: white; " class="btn btn-info" value="<?= $r['dateDebut'] ?>"/></td>
                       <td style="background-color:#5bc0de;"><input type="text" name ="new_date_f" style=" color: black; " class="btn btn-light" value="<?= $r['dateFin'] ?>"/></td>
                       <td style="background-color:#5bc0de;">
                         <?php $cur = $reservation->getCurrentReserv()->fetchAll();
                           foreach($cur as $v => $c){
                             if($reservation->getCurrentReserv()->rowCount() > 0  && $c['id_r'] == $r['id_r']){
                                 ?><input type="submit" name ="setDateFin" style=" color: white; " class="btn btn-warning" value="Modifier"/> <?php
                             }
                           }?>
                       </td>
                       <td style="background-color:#5bc0de;">
                         <?php $cur = $reservation->getCurrentReserv()->fetchAll();
                           foreach($cur as $v => $c){
                             if($reservation->getCurrentReserv()->rowCount() > 0  && $c['id_r'] == $r['id_r']){
                                 ?> <input type="submit" name ="ecourter" style=" color: white; " class="btn btn-warning" value="Ecourter"/> <?php
                             }
                           }?>
                       </td>
                       <td style="background-color:#5bc0de;"><input type="submit" name ="annuler" style=" color: white; " class="btn btn-danger" value="Supprimer"/></td>
              </form>

            <?php }  ?>
                   </tr>
                 </tbody>
               </table> <?php
          }
          else{echo "<p class='btn btn-warning'><b> aucun résultat trouvé ".$_POST['recherche_resv']." !</b></p>";}
         }



           if(isset($currentResv)){
             $req = $currentResv->fetchAll();
             if($currentResv->rowCount() > 0){
               ?>
               <table class="table table-bordered bordered-dark" style="border:1px solid black;">
                <thead class="" style="background-color:black;">
                  <tr style="text-align: center;">
                    <th scope="col" style="text-align: center;" >#</th>
                    <th scope="col" style="text-align: center;" >Nom</th>
                    <th scope="col" style="text-align: center;" >Places</th>
                    <th scope="col" style="text-align: center;" >Coûts</th>
                    <th scope="col" style="text-align: center;" >Debut</th>
                    <th scope="col" style="text-align: center;" >Fin</th>
                    <th scope="col" style="text-align: center;" >Modifier</th>
                    <th scope="col" style="text-align: center;" >Ecourter</th>
                    <th scope="col" style="text-align: center;" >Annuler</th>
                  </tr>
                </thead> <?php
               foreach($req as $v => $r){ ?>
                 <form action="reservation" method="post">
                     <input type="hidden" name ="id_r" style=" color: white; " class="btn btn-info" value="<?= $r['id_r'] ?>"/>
                     <input type="hidden" name ="id_p" style=" color: white; " class="btn btn-info" value="<?= $r['id_p'] ?>"/>
                     <input type="hidden" name ="date_d" style=" color: white; " class="btn btn-info" value="<?= $r['dateDebut'] ?>"/>
                     <input type="hidden" name ="date_f" style=" color: white; " class="btn btn-info" value="<?= $r['dateFin'] ?>"/>
                     <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
                     <tbody style="border:1px solid black" >
                       <tr style="border:1px solid black">
                         <th scope="row" style="text-align: center; background-color:#5bc0de;" ><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
                         <td style="background-color:#5bc0de;"><input type="button" name ="nom_u" style=" color: white; " class="btn btn-info" value="<?= $r['nom_u'] ?>"/></td>
                         <td style="background-color:#5bc0de;"><input type="button" name ="nom_p" style=" color: white; " class="btn btn-info" value="<?= $r['nom_p'] ?>"/></td>
                         <td style="background-color:#5bc0de;"><input type="button" name ="nom_p" style=" color: white; " class="btn btn-info" value="<?= $r['prix'].'€/h' ?>"/></td>
                         <td style="background-color:#5bc0de;"><input type="button" name ="date_d" style=" color: white; " class="btn btn-info" value="<?= $r['dateDebut'] ?>"/></td>
                         <td style="background-color:#5bc0de;"><input type="text" name ="new_date_f" style=" color: black; " class="btn btn-light" value="<?= $r['dateFin'] ?>"/></td>
                         <td style="background-color:#5bc0de;">
                           <?php $cur = $reservation->getCurrentReserv()->fetchAll();
                             foreach($cur as $v => $c){
                               if($reservation->getCurrentReserv()->rowCount() > 0  && $c['id_r'] == $r['id_r']){
                                   ?><input type="submit" name ="setDateFin" style=" color: white; " class="btn btn-warning" value="Modifier"/> <?php
                               }
                             }?>
                         </td>
                         <td style="background-color:#5bc0de;">
                           <?php $cur = $reservation->getCurrentReserv()->fetchAll();
                             foreach($cur as $v => $c){
                               if($reservation->getCurrentReserv()->rowCount() > 0  && $c['id_r'] == $r['id_r']){
                                   ?> <input type="submit" name ="ecourter" style=" color: white; " class="btn btn-warning" value="Ecourter"/> <?php
                               }
                             }?>
                         </td>
                         <td style="background-color:#5bc0de;"><input type="submit" name ="annuler" style=" color: white; " class="btn btn-danger" value="Supprimer"/></td>
                </form>

              <?php }  ?>
                     </tr>
                   </tbody>
                 </table> <?php
            }
            else{echo "<p class='btn btn-warning'><b> aucune réservation en cours !</b></p>";}
           }



             if(isset($endResv)){
               $req = $endResv->fetchAll();
               if($endResv->rowCount() > 0){
                 ?>
                 <table class="table table-bordered bordered-dark" style="border:1px solid black;">
                  <thead class="" style="background-color:black;">
                    <tr style="text-align: center;">
                      <th scope="col" style="text-align: center;" >#</th>
                      <th scope="col" style="text-align: center;" >Nom</th>
                      <th scope="col" style="text-align: center;" >Places</th>
                      <th scope="col" style="text-align: center;" >Coûts</th>
                      <th scope="col" style="text-align: center;" >Debut</th>
                      <th scope="col" style="text-align: center;" >Fin</th>
                      <th scope="col" style="text-align: center;" >Modifier</th>
                      <th scope="col" style="text-align: center;" >Ecourter</th>
                      <th scope="col" style="text-align: center;" >Supprimer</th>
                    </tr>
                  </thead> <?php
                 foreach($req as $v => $r){ ?>
                   <form action="reservation" method="post">
                       <input type="hidden" name ="id_r" style=" color: white; " class="btn btn-info" value="<?= $r['id_r'] ?>"/>
                       <input type="hidden" name ="id_p" style=" color: white; " class="btn btn-info" value="<?= $r['id_p'] ?>"/>
                       <input type="hidden" name ="date_d" style=" color: white; " class="btn btn-info" value="<?= $r['dateDebut'] ?>"/>
                       <input type="hidden" name ="date_f" style=" color: white; " class="btn btn-info" value="<?= $r['dateFin'] ?>"/>
                       <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
                       <tbody style="border:1px solid black" >
                         <tr style="border:1px solid black">
                           <th scope="row" style="text-align: center; background-color:#5bc0de;" ><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
                           <td style="background-color:#5bc0de;"><input type="button" name ="nom_u" style=" color: white; " class="btn btn-info" value="<?= $r['nom_u'] ?>"/></td>
                           <td style="background-color:#5bc0de;"><input type="button" name ="nom_p" style=" color: white; " class="btn btn-info" value="<?= $r['nom_p'] ?>"/></td>
                           <td style="background-color:#5bc0de;"><input type="button" name ="nom_p" style=" color: white; " class="btn btn-info" value="<?= $r['prix'].'€/h' ?>"/></td>
                           <td style="background-color:#5bc0de;"><input type="button" name ="date_d" style=" color: white; " class="btn btn-info" value="<?= $r['dateDebut'] ?>"/></td>
                           <td style="background-color:#5bc0de;"><input type="text" name ="new_date_f" style=" color: black; " class="btn btn-light" value="<?= $r['dateFin'] ?>"/></td>
                           <td style="background-color:#5bc0de;">
                             <?php $cur = $reservation->getCurrentReserv()->fetchAll();
                               foreach($cur as $v => $c){
                                 if($reservation->getCurrentReserv()->rowCount() > 0  && $c['id_r'] == $r['id_r']){
                                     ?><input type="submit" name ="setDateFin" style=" color: white; " class="btn btn-warning" value="Modifier"/> <?php
                                 }
                               }?>
                           </td>
                           <td style="background-color:#5bc0de;">
                             <?php $cur = $reservation->getCurrentReserv()->fetchAll();
                               foreach($cur as $v => $c){
                                 if($reservation->getCurrentReserv()->rowCount() > 0  && $c['id_r'] == $r['id_r']){
                                     ?> <input type="submit" name ="ecourter" style=" color: white; " class="btn btn-warning" value="Ecourter"/> <?php
                                 }
                               }?>
                           </td>
                           <td style="background-color:#5bc0de;"><input type="submit" name ="annuler" style=" color: white; " class="btn btn-danger" value="Supprimer"/></td>
                  </form>

                <?php }  ?>
                       </tr>
                     </tbody>
                   </table> <?php
              }
              else{echo "<p class='btn btn-warning'><b> aucun résultat trouvé !</b></p>";}
             }



             if(!isset($rechercheResv) && !isset($currentResv) && !isset($endResv)){
              $req = $reservation->getAllReservList()->fetchAll();
              if($reservation->getAllReservList()->rowCount() > 0){
                ?>
                <table class="table table-bordered bordered-dark" style="border:1px solid black;">
                 <thead class="" style="background-color:black;">
                   <tr style="text-align: center;">
                     <th scope="col" style="text-align: center;" >#</th>
                     <th scope="col" style="text-align: center;" >Nom</th>
                     <th scope="col" style="text-align: center;" >Places</th>
                     <th scope="col" style="text-align: center;" >Coûts</th>
                     <th scope="col" style="text-align: center;" >Debut</th>
                     <th scope="col" style="text-align: center;" >Fin</th>
                     <th scope="col" style="text-align: center;" >Modifier</th>
                     <th scope="col" style="text-align: center;" >Ecourter</th>
                     <th scope="col" style="text-align: center;" >Annuler</th>
                   </tr>
                 </thead> <?php
                foreach($req as $v => $r){ ?>
                  <form action="reservation" method="post">
                      <input type="hidden" name ="id_r" style=" color: white; " class="btn btn-info" value="<?= $r['id_r'] ?>"/>
                      <input type="hidden" name ="id_p" style=" color: white; " class="btn btn-info" value="<?= $r['id_p'] ?>"/>
                      <input type="hidden" name ="date_d" style=" color: white; " class="btn btn-info" value="<?= $r['dateDebut'] ?>"/>
                      <input type="hidden" name ="date_f" style=" color: white; " class="btn btn-info" value="<?= $r['dateFin'] ?>"/>
                      <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
                      <tbody style="border:1px solid black" >
                        <tr style="border:1px solid black">
                          <th scope="row" style="text-align: center; background-color:#5bc0de;" ><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
                          <td style="background-color:#5bc0de;"><input type="button" name ="nom_u" style=" color: white; " class="btn btn-info" value="<?= $r['nom_u'] ?>"/></td>
                          <td style="background-color:#5bc0de;"><input type="button" name ="nom_p" style=" color: white; " class="btn btn-info" value="<?= $r['nom_p'] ?>"/></td>
                          <td style="background-color:#5bc0de;"><input type="button" name ="nom_p" style=" color: white; " class="btn btn-info" value="<?= $r['prix'].'€/h' ?>"/></td>
                          <td style="background-color:#5bc0de;"><input type="button" name ="date_d" style=" color: white; " class="btn btn-info" value="<?= $r['dateDebut'] ?>"/></td>
                          <td style="background-color:#5bc0de;"><input type="text" name ="new_date_f" style=" color: black; " class="btn btn-light" value="<?= $r['dateFin'] ?>"/></td>
                          <td style="background-color:#5bc0de;">
                            <?php $cur = $reservation->getCurrentReserv()->fetchAll();
                              foreach($cur as $v => $c){
                                if($reservation->getCurrentReserv()->rowCount() > 0  && $c['id_r'] == $r['id_r']){
                                    ?><input type="submit" name ="setDateFin" style=" color: white; " class="btn btn-warning" value="Modifier"/> <?php
                                }
                              }?>
                          </td>
                          <td style="background-color:#5bc0de;">
                            <?php $cur = $reservation->getCurrentReserv()->fetchAll();
                              foreach($cur as $v => $c){
                                if($reservation->getCurrentReserv()->rowCount() > 0  && $c['id_r'] == $r['id_r']){
                                    ?> <input type="submit" name ="ecourter" style=" color: white; " class="btn btn-warning" value="Ecourter"/> <?php
                                }
                              }?>
                          </td>
                          <td style="background-color:#5bc0de;"><input type="submit" name ="annuler" style=" color: white; " class="btn btn-danger" value="Supprimer"/></td>
                 </form>

               <?php }  ?>
                      </tr>
                    </tbody>
                  </table> <?php
             }
             else{echo "<p class='btn btn-warning'><b> Occune réservation n'a été effectuée !</b></p>";} } ?>
             <br>
             <br>
      </div>

      <!-- <div id="duree" class="text-center" style="display:block">
        <p style="color: black; font-size:50px;">DUREE RESERVATION</p>
        <?php //if(!isset($reservation)){  $reservation = new Reservation(60);}
        $timeReserv = $reservation->getTimeReserv(); //var_dump($timeReserv); ?>
        <form action="reservation" method="post">
          <input type="text" name ="time" style=" color: black; " class="btn btn-secondary" placeholder="<?=$timeReserv ?>" />
          <input type="submit" name ="setTimeReserv" style=" color: white; " class="btn btn-warning" value="Modifier"/>
        </form>
        <br>
        <br>
      </div> -->
<?php }
        else echo "<p class='btn btn-warning'><b>Vous ne disposez pas des drois nécessaires pour accéder à cette page.</b></p>";?>
