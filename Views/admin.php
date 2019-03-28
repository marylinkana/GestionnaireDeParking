<?php
  if(isset($_SESSION['niveau']) && $_SESSION['niveau'] == 2){?>
    <div id="insc" class="text-center" style="display:block">
    <p style="color: black; font-size:50px;">INSCRIPTIONS</p>
     <?php
      $req = getListInscrit()->fetchAll();
      if(getListUser()->rowCount() >= 1){
        foreach($req as $v => $r){ ?>
          <form action="admin" method="post">
              <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
              <input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/>
              <input type="button" name ="nom" style=" color: white; " class="btn btn-info" value="<?='Nom : '.$r['nom_u']. ' --> Prenom : '.$r['prenom'].' --> Email : '.$r['email']?>"/>
              <input type="button" name ="niveau" style=" color: white; " class="btn btn-info" value="<?='Niveau : '.$r['niveau']?>"/><br>
              <input type="submit" name ="valider" style=" color: white; " class="btn btn-success" value="Valider l'inscription"/>
         </form>
       <?php }
     }
     else{echo "<p class='btn btn-warning'><b> Aucune Nouvelle inscription!</b></p>";} ?>
     <br>
     <br>
   </div>

  <div id="user" class="text-center" style="display:none">
    <p style="color: black; font-size:50px;">UTILISATEURS</p>
     <?php
      $req = getListUser()->fetchAll();
      if(getListUser()->rowCount() >= 1){
        foreach($req as $v => $r){ ?>
          <form action="admin" method="post">
              <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
              <input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/>
              <input type="button" name ="nom" style=" color: white; " class="btn btn-info" value="<?='Nom : '.$r['nom_u'].' --> Prenom : '.$r['prenom'].' --> Email : '.$r['email']?>"/>
              <input type="button" name ="niveau" style=" color: white; " class="btn btn-info" value="<?='Niveau : '.$r['niveau']?>"/><br>
              <input type="submit" name ="annuler" style=" color: white; " class="btn btn-danger" value="Annuler l'inscription"/>
         </form>
         <br>
       <?php }
     }
     else{echo "<p class='btn btn-warning'><b> Aucune Utilisateur!</b></p>";}?>
       <br>
       <br>
  </div>

  <div id="resv" class="text-center" style="display:none">
    <p style="color: black; font-size:50px;">RESERVATIONS</p>
     <?php
      $req = getListReservation()->fetchAll();
      if(getListReservation()->rowCount() >= 1){
        foreach($req as $v => $r){ ?>
          <form action="admin" method="post">
              <input type="hidden" name ="id_p" style=" color: white; " class="btn btn-info" value="<?= $r['id_r'] ?>"/>
              <input type="hidden" name ="id_p" style=" color: white; " class="btn btn-info" value="<?= $r['id_p'] ?>"/>
              <input type="hidden" name ="id_p" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
              <input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/>
              <input type="button" name ="nom_u" style=" color: white; " class="btn btn-info" value="<?='Nom : '.$r['nom_u'].
              ' --> Place : '.$r['nom_p'].' --> Debut : '.$r['dateDebut'].' --> Fin : '.$r['dateFin']?>"/>
              <!-- <input type="submit" name ="supprimer" style=" color: white; " class="btn btn-danger" value="Supprimer"/> -->
         </form>

       <?php }
     }
     else{echo "<p class='btn btn-warning'><b> Vous n'avez pas encore fait de réservations !</b></p>";}?>
     <br>
     <br>
  </div>

  <div id="disp" class="text-center" style="display:none">
      <p style="color: black; font-size:50px;">PLACES DISPONIBLES</p>
       <?php
        $req = getListPlacesDispo()->fetchAll();
        foreach($req as $v => $r){ ?>
          <form action="#" method="post">
              <input type="hidden" name ="id_p" style=" color: white; " class="btn btn-info" value="<?= $r['id_p'] ?>"/>
              <?php //var_dump($r['id_p']) ?>
              <input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/>
              <input type="button" name ="nom" style=" color: white; " class="btn btn-info" value="<?='Place : '.$r['nom_p']?>"/>
              <?php //var_dump($r['nom_p']) ?>
         </form>
        <?php }
         if(getListPlacesDispo()->rowCount() < 1){
           echo "<p class='btn btn-warning'><b> aucune place n'est disponible pour la moment !</b></p>";
         }?>
       <br>
       <br>
  </div>

  <div id="file" class="text-center" style="display:none">
  <p style="color: black; font-size:50px;">FILE D'ATTENTE</p>
   <?php
   if(getWettingList()->rowCount() >= 1){
     exitOfFile();
    $req = getWettingList()->fetchAll();
    foreach($req as $v => $r){ ?>
      <form action="admin" method="post">
          <input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= 'Rang : '.$r['rang'] ?>"/>
          <input type="button" name ="nom" style=" color: white; " class="btn btn-info" value="<?='Nom : '.$r['nom_u'] ?>"/>
     </form>
   <?php }
 } else {echo "<p class='btn btn-warning'><b> aucune file d'attente !</b></p>";}?>

 <br>
 <br>
 </div>

  <div id="cree" class="text-center" style="display:none">
    <p style="color: black; font-size:50px;">NOUVELLE PLACES</p>
    <form action="admin" method="post">
      <input type="text" name ="nom" style=" color: black; " class="btn btn-secondary" />
      <input type="submit" name ="ajouter" style=" color: white; " class="btn btn-success" value="Ajouter"/>
    </form>
    <br>
     <?php
              $req = getListPlaces()->fetchAll();
      foreach($req as $v => $r){ ?>
        <form action="admin" method="post">

            <input type="hidden" name ="id_p" style=" color: white; " class="btn btn-info" value="<?= $r['id_p'] ?>"/>
            <input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/>
            <input type="button" name ="nom" style=" color: white; " class="btn btn-info" value="<?='Nom : '.$r['nom_p']?>"/>
            <input type="submit" name ="supprimer" style=" color: white; " class="btn btn-danger" value="Supprimer"/>
       </form>
       <br>
     <?php } ?>
     <br>
  </div>
<?php }
        else echo "<p class='btn btn-warning'><b>Vous ne disposez pas des drois nécessaires pour accéder à cette page.</b></p>";?>
