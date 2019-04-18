<?php
  if(isset($_SESSION['niveau']) && $_SESSION['niveau'] == 2){?>
    <div id="insc" class="text-center" style="display:block">
    <p style="color: black; font-size:50px;">INSCRIPTIONS</p>
    <form action="admin" method="post">
      <input type="text" name ="recherche" style=" color: black; " class="btn btn-secondary" placeholder="recherche" />
      <input type="submit" name ="rechercheInsc" style=" color: white; " class="btn btn-success" value="Rechercher"/>
    </form>
     <?php
     if(isset($rechercheInsc)){
       //var_dump($rechercheInsc);
       $req = $rechercheInsc->fetchAll();
       //var_dump($req);
       if($rechercheInsc->rowCount() >= 1){
         ?>
         <table class="table table-bordered bordered-dark" style="border:1px solid black;">
          <thead class="" style="background-color:black;">
            <tr style="text-align: center;">
              <th scope="col" style="text-align: center;" >#</th>
              <th scope="col" style="text-align: center;" >Nom</th>
              <th scope="col" style="text-align: center;" >Prenom</th>
              <th scope="col" style="text-align: center;" >Email</th>
              <th scope="col" style="text-align: center;" >Niveau</th>
              <th scope="col" style="text-align: center;" >Valider</th>
            </tr>
          </thead> <?php
         foreach($req as $v => $r){ ?>
           <form action="admin" method="post">
               <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
               <tbody style="border:1px solid black">
                 <tr style="border:1px solid black">
                   <th scope="row" style="text-align: center; background-color:#5bc0de;" ><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
                   <td style="background-color:#5bc0de;"><input type="button" name ="nom" style=" color: white; " class="btn btn-info" value="<?= $r['nom_u'] ?>"/></td>
                   <td style="background-color:#5bc0de;"><input type="button" name ="prenom" style=" color: white; " class="btn btn-info" value="<?= $r['prenom'] ?>"/></td>
                   <td style="background-color:#5bc0de;"><input type="button" name ="email" style=" color: white; " class="btn btn-info" value="<?= $r['email'] ?>"/></td>
                   <td style="background-color:#5bc0de;"><input type="button" name ="niveau" style=" color: white; " class="btn btn-info" value="<?= $r['niveau'] ?>"/></td>
                   <td style="background-color:#5bc0de;"><input type="submit" name ="valider" style=" color: white; " class="btn btn-success" value="Valider"/></td>
          </form>
        <?php }
      } else{ echo "<p class='btn btn-warning'><b> Aucune résultat pour : ".$_POST['recherche']."</b></p>";}
    } else{
      $req = $user->getListInscrit()->fetchAll();
      if($user->getListUser()->rowCount() >= 1){
        ?>
        <table class="table table-bordered bordered-dark" style="border:1px solid black;">
         <thead class="" style="background-color:black;">
           <tr style="text-align:center;">
             <th scope="col" style="text-align: center;" >#</th>
             <th scope="col" style="text-align: center;" >Nom</th>
             <th scope="col" style="text-align: center;" >Prenom</th>
             <th scope="col" style="text-align: center;" >Email</th>
             <th scope="col" style="text-align: center;" >Niveau</th>
             <th scope="col" style="text-align: center;" >Valider</th>
           </tr>
         </thead> <?php
        foreach($req as $v => $r){ ?>
          <form action="admin" method="post">
            <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
            <tbody style="border:1px solid black" >
              <tr style="border:1px solid black">
                <th scope="row" style="text-align: center; background-color:#5bc0de;" ><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
                <td style="background-color:#5bc0de;" ><input type="button" name ="nom" style=" color: white; " class="btn btn-info" value="<?= $r['nom_u'] ?>"/></td>
                <td style="background-color:#5bc0de;" ><input type="button" name ="prenom" style=" color: white; " class="btn btn-info" value="<?= $r['prenom'] ?>"/></td>
                <td style="background-color:#5bc0de;" ><input type="button" name ="email" style=" color: white; " class="btn btn-info" value="<?= $r['email'] ?>"/></td>
                <td style="background-color:#5bc0de;" ><input type="button" name ="niveau" style=" color: white; " class="btn btn-info" value="<?= $r['niveau'] ?>"/></td>
                <td style="background-color:#5bc0de;" ><input type="submit" name ="valider" style=" color: white; " class="btn btn-success" value="Valider"/></td>
         </form>
         <br/>
       <?php } ?>
              </tr>
            </tbody>
          </table> <?php
     }
     else{echo "<p class='btn btn-warning'><b> Aucune Nouvelle inscription!</b></p>";} } ?>
     <br>
     <br/>
   </div>

  <div id="user" class="text-center" style="display:block">
    <p style="color: black; font-size:50px;">UTILISATEURS</p>
    <form action="admin" method="post">
      <input type="text" name ="nom" style=" color: black; " class="btn btn-secondary" placeholder="nom" />
      <input type="text" name ="prenom" style=" color: black; " class="btn btn-secondary" placeholder="prenom" />
      <input type="text" name ="email" style=" color: black; " class="btn btn-secondary" placeholder="email" />
      <input type="text" name ="mdp" style=" color: black; " class="btn btn-secondary" placeholder="mdp" />
      <input type="submit" name ="addUser" style=" color: white; " class="btn btn-success" value="Ajouter"/>
      <hr>
    </form>
     <?php
      $req = $user->getListUser()->fetchAll();
      if($user->getListUser()->rowCount() >= 1){
        ?>
        <table class="table table-bordered bordered-dark" style="border:1px solid black;">
         <thead class="" style="background-color:black;">
           <tr style="text-align: center;">
             <th scope="col" style="text-align: center;" >#</th>
             <th scope="col" style="text-align: center;" >Nom</th>
             <th scope="col" style="text-align: center;" >Prenom</th>
             <th scope="col" style="text-align: center;" >Email</th>
             <th scope="col" style="text-align: center;" >Niveau</th>
             <th scope="col" style="text-align: center;" >Réinitialiser</th>
             <th scope="col" style="text-align: center;" >Banir</th>
             <th scope="col" style="text-align: center;" >Supprimer</th>
           </tr>
         </thead> <?php
        foreach($req as $v => $r){ ?>
          <form action="admin" method="post">
              <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
              <input type="hidden" name ="mdp" style=" color: white; " class="btn btn-info" value="azerty"/>
              <input type="hidden" name ="email" style=" color: white; " class="btn btn-info" value="<?= $r['email'] ?>"/>
              <tbody style="border:1px solid black" >
                <tr style="border:1px solid black">
                  <th scope="row" style="text-align: center; background-color:#5bc0de;" ><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
                  <td style="background-color:#5bc0de;"><input type="button" name ="nom" style=" color: white; " class="btn btn-info" value="<?= $r['nom_u'] ?>"/></td>
                  <td style="background-color:#5bc0de;"><input type="button" name ="prenom" style=" color: white; " class="btn btn-info" value="<?= $r['prenom'] ?>"/></td>
                  <td style="background-color:#5bc0de;"><input type="button" name ="email" style=" color: white; " class="btn btn-info" value="<?= $r['email'] ?>"/></td>
                  <td style="background-color:#5bc0de;"><input type="button" name ="niveau" style=" color: white; " class="btn btn-info" value="<?= $r['niveau'] ?>"/></td>
                  <td style="background-color:#5bc0de;"><input type="submit" name ="reset" style=" color: white; " class="btn btn-warning" value="Réinitialiser"/></td>
                  <td style="background-color:#5bc0de;"><input type="submit" name ="bannir" style=" color: white; " class="btn btn-danger" value="Bannir"/></td>
                  <td style="background-color:#5bc0de;"><input type="submit" name ="retirer" style=" color: white; " class="btn btn-danger" value="supprimer"/></td>
         </form>
       <?php } ?>
              </tr>
            </tbody>
          </table> <?php
     }
     else{echo "<p class='btn btn-warning'><b> Aucune Utilisateur!</b></p>";}?>
       <br/>
       <br/>
  </div>

  <div id="resv" class="text-center" style="display:block">
    <p style="color: black; font-size:50px;">RESERVATIONS</p>
     <?php
      $req = $reservation->getAllReservList()->fetchAll();
      if($reservation->getAllReservList()->rowCount() >= 1){
        ?>
        <table class="table table-bordered bordered-dark" style="border:1px solid black;">
         <thead class="" style="background-color:black;">
           <tr style="text-align: center;">
             <th scope="col" style="text-align: center;" >#</th>
             <th scope="col" style="text-align: center;" >Nom</th>
             <th scope="col" style="text-align: center;" >Places</th>
             <th scope="col" style="text-align: center;" >Debut</th>
             <th scope="col" style="text-align: center;" >Fin</th>
             <th scope="col" style="text-align: center;" >Modifier</th>
             <th scope="col" style="text-align: center;" >Ecourter</th>
             <th scope="col" style="text-align: center;" >Annuler</th>
           </tr>
         </thead> <?php
        foreach($req as $v => $r){ ?>
          <form action="admin" method="post">
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
                  <td style="background-color:#5bc0de;"><input type="button" name ="date_d" style=" color: white; " class="btn btn-info" value="<?= $r['dateDebut'] ?>"/></td>
                  <td style="background-color:#5bc0de;"><input type="text" name ="new_date_f" style=" color: black; " class="btn btn-light" value="<?= $r['dateFin'] ?>"/></td>
                  <td style="background-color:#5bc0de;"><input type="submit" name ="setDateFin" style=" color: white; " class="btn btn-warning" value="Modifier"/></td>
                  <td style="background-color:#5bc0de;">
                    <?php $cur = $reservation->getCurrentReserv()->fetchAll();
                      foreach($cur as $v => $c){
                        if($reservation->getCurrentReserv()->rowCount() >= 1  && $c['id_r'] == $r['id_r']){
                            ?> <input type="submit" name ="ecourter" style=" color: white; " class="btn btn-warning" value="Ecourter"/> <?php
                        }
                      }?>
                  </td>
                  <td style="background-color:#5bc0de;"><input type="submit" name ="annuler" style=" color: white; " class="btn btn-danger" value="Annuler"/></td>
         </form>

       <?php }  ?>
              </tr>
            </tbody>
          </table> <?php
     }
     else{echo "<p class='btn btn-warning'><b> Occune réservation n'a été effectuée !</b></p>";}?>
     <br>
     <br>
  </div>

  <!-- <div id="duree" class="text-center" style="display:block">
    <p style="color: black; font-size:50px;">DUREE RESERVATION</p>
    <?php //if(!isset($reservation)){  $reservation = new Reservation(60);}
    $timeReserv = $reservation->getTimeReserv(); //var_dump($timeReserv); ?>
    <form action="admin" method="post">
      <input type="text" name ="time" style=" color: black; " class="btn btn-secondary" placeholder="<?=$timeReserv ?>" />
      <input type="submit" name ="setTimeReserv" style=" color: white; " class="btn btn-warning" value="Modifier"/>
    </form>
    <br>
    <br>
  </div> -->

  <div id="disp" class="text-center" style="display:block">
      <p style="color: black; font-size:50px;">PLACES DISPONIBLES</p>
       <?php
        $req = $place->getListPlacesDispo()->fetchAll();
        ?>
        <table class="table table-bordered bordered-dark" style="border:1px solid black;">
         <thead class="" style="background-color:black;">
           <tr style="text-align: center;">
             <th scope="col" style="text-align: center;" >#</th>
             <th scope="col" style="text-align: center;" >Places</th>
             <th scope="col" style="text-align: center;" >Attribuer à</th>
             <th scope="col" style="text-align: center;" >Attibuer</th>

           </tr>
         </thead> <?php
        foreach($req as $v => $r){ ?>
          <form action="admin" method="post">
            <input type="hidden" name ="id_p" style=" color: white; " class="btn btn-info" value="<?= $r['id_p'] ?> "/>
            <tbody style="border:1px solid black" >
              <tr style="border:1px solid black">
                <th scope="row" style="text-align: center; background-color:#5bc0de;" >
                  <input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
                  <td style="background-color:#5bc0de;">
                    <input type="button" name ="nom_p" style=" color: white; " class="btn btn-info" value="<?=$r['nom_p']?>"/></td>
                  <td style="background-color:#5bc0de;">
                    <select type="select" style=" color: black; " class="btn btn-light">
                       <?php $userList = $user->getListUser()->fetchAll();
                       foreach($userList as $v => $u){?>
                         <option type="email" name="id_u" value="<?= $u['id_u'] ?>" > <?=$u['nom_u']." ".$u['prenom']." ".$u['email'] ?></option>
                       <?php } ?>
                    </select>
                  </td>
                  <td style="background-color:#5bc0de;"><input type="submit" name ="attribuer" style=" color: white; " class="btn btn-success" value="Attribuer"/></td>
         </form>
       <?php } ?>
              </tr>
            </tbody>
          </table> <?php
         if($place->getListPlacesDispo()->rowCount() < 1){
           echo "<p class='btn btn-warning'><b> aucune place n'est disponible pour la moment !</b></p>";
         }?>
       <br>
       <br>
  </div>

  <div id="file" class="text-center" style="display:block">
  <p style="color: black; font-size:50px;">FILE D'ATTENTE</p>
   <?php
   if($file->getFileList()->rowCount() >= 1){
    //exitOfFile();
    ?>
    <table class="table table-bordered bordered-dark" style="border:1px solid black;">
     <thead class="" style="background-color:black;">
       <tr style="text-align: center;">
         <th scope="col" style="text-align: center;" >Rang</th>
         <th scope="col" style="text-align: center;" >Demandeur</th>
       </tr>
     </thead> <?php
    $req = $file->getFileList()->fetchAll();
    foreach($req as $v => $r){ ?>
      <form action="admin" method="post">
        <tbody style="border:1px solid black" >
          <tr style="border:1px solid black">
            <th scope="row" style="text-align: center; background-color:#5bc0de;" ><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $r['rang'] ?>"/></th>
            <td style="background-color:#5bc0de;"><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?=$r['nom_u']?>"/></td>
            <td style="background-color:#5bc0de;"><input type="submit" name ="nom" style=" color: white; " class="btn btn-danger" value="supprimer"/></td>
     </form>
   <?php }?>
          </tr>
        </tbody>
      </table> <?php
 } else {echo "<p class='btn btn-warning'><b> aucune file d'attente !</b></p>";}?>
 <br>
 <br>
 </div>

  <div id="cree" class="text-center" style="display:block">
    <p style="color: black; font-size:50px;">NOUVELLE PLACES</p>
    <form action="admin" method="post">
      <input type="text" name ="nom" style=" color: black; " class="btn btn-secondary" placeholder="Nom de la place"/>
      <input type="submit" name ="ajouter" style=" color: white; " class="btn btn-success" value="Ajouter"/>
    </form>
    <br>
    <?php
     $req = $place->getListPlaces()->fetchAll();
     ?>
     <table class="table table-bordered bordered-dark" style="border:1px solid black;">
      <thead class="" style="background-color:black;">
        <tr style="text-align: center;">
          <th scope="col" style="text-align: center;" >#</th>
          <th scope="col" style="text-align: center;" >Places</th>
          <th scope="col" style="text-align: center;" >Supprimer</th>
        </tr>
      </thead> <?php
     foreach($req as $v => $r){ ?>
       <form action="admin" method="post">
         <input type="hidden" name ="id_p" style=" color: white; " class="btn btn-info" value="<?= $r['id_p'] ?> "/>
         <tbody style="border:1px solid black" >
           <tr style="border:1px solid black">
             <th scope="row" style="text-align: center; background-color:#5bc0de;" ><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
             <td style="background-color:#5bc0de;"><input type="button" name ="nom_p" style=" color: white; " class="btn btn-info" value="<?=$r['nom_p']?>"/></td>
             <td style="background-color:#5bc0de;"><input type="submit" name ="supprimer" style=" color: white; " class="btn btn-danger" value="supprimer"/></td>
      </form>
    <?php } ?>
           </tr>
         </tbody>
       </table> <?php ?>
     <br>
  </div>
<?php }
        else echo "<p class='btn btn-warning'><b>Vous ne disposez pas des drois nécessaires pour accéder à cette page.</b></p>";?>
