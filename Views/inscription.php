<?php //$file->outOfFile();
if(isset($_SESSION['niveau']) && $_SESSION['niveau'] == 2){?>

<div id="insc" class="text-center" style="display:block">
<p style="color: black; font-size:50px;">INSCRIPTIONS</p>
<form action="inscription" method="post">
  <input type="text" name ="recherche_insc" style=" color: black; " class="btn btn-secondary" placeholder="recherche" />
  <input type="submit" name ="rechercheInsc" style=" color: white; " class="btn btn-success" value="Rechercher"/>
  <input type="submit" name ="avalider" style=" color: white; " class="btn btn-success" value="A valider"/>
  <input type="submit" name ="bannis" style=" color: white; " class="btn btn-success" value="Bannis"/>
</form>
<hr>


<form action="inscription" method="post">
  <input type="text" name ="nom" style=" color: black; " class="btn btn-secondary" placeholder="nom" />
  <input type="text" name ="prenom" style=" color: black; " class="btn btn-secondary" placeholder="prenom" />
  <input type="email" name ="email" style=" color: black; " class="btn btn-secondary" placeholder="email" />
  <input type="hidden" name ="mdp" style=" color: black; " class="btn btn-secondary" value="azerty" />
  <input type="button" style=" color: black; " class="btn btn-secondary" value="Mot de passe : azerty" />
  <input type="submit" name ="addUser" style=" color: white; " class="btn btn-success" value="Insrire"/>
</form>
<br/>



 <?php
 if(isset($rechercheInsc)){
   //var_dump($rechercheInsc);
   $req = $rechercheInsc->fetchAll();
   //var_dump($req);
   if($rechercheInsc->rowCount() > 0){
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
          <th scope="col" style="text-align: center;" >Supprimer</th>
        </tr>
      </thead> <?php
     foreach($req as $v => $r){ ?>
       <form action="inscription" method="post">
           <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
           <tbody style="border:1px solid black">
             <tr style="border:1px solid black">
               <th scope="row" style="text-align: center; background-color:#5bc0de;" ><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
               <td style="background-color:#5bc0de;"><input type="button" name ="nom" style=" color: white; " class="btn btn-info" value="<?= $r['nom_u'] ?>"/></td>
               <td style="background-color:#5bc0de;"><input type="button" name ="prenom" style=" color: white; " class="btn btn-info" value="<?= $r['prenom'] ?>"/></td>
               <td style="background-color:#5bc0de;"><input type="button" name ="email" style=" color: white; " class="btn btn-info" value="<?= $r['email'] ?>"/></td>
               <td style="background-color:#5bc0de;"><input type="button" name ="niveau" style=" color: white; " class="btn btn-info"
                   value="<?php if($r['niveau'] == 0){ echo'A valider' ;} if($r['niveau'] == -1){echo'Banni';} ?>"/></td>
               <td style="background-color:#5bc0de;"><input type="submit" name ="valider" style=" color: white; " class="btn btn-success" value="Valider"/></td>
               <td style="background-color:#5bc0de;"><input type="submit" name ="retirer" style=" color: white; " class="btn btn-danger" value="supprimer"/></td>
      </form>
    <?php } ?>
           </tr>
         </tbody>
       </table> <?php
  } else{ echo "<p class='btn btn-warning'><b> Aucune résultat pour : ".$_POST['recherche_insc']."</b></p>";}
}



 if(isset($aValider)){
   $req = $aValider->fetchAll();
   if($aValider->rowCount() > 0){
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
        <th scope="col" style="text-align: center;" >Supprimer</th>
      </tr>
    </thead> <?php
   foreach($req as $v => $r){ ?>
     <form action="inscription" method="post">
       <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
       <tbody style="border:1px solid black" >
         <tr style="border:1px solid black">
           <th scope="row" style="text-align: center; background-color:#5bc0de;" ><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
           <td style="background-color:#5bc0de;" ><input type="button" name ="nom" style=" color: white; " class="btn btn-info" value="<?= $r['nom_u'] ?>"/></td>
           <td style="background-color:#5bc0de;" ><input type="button" name ="prenom" style=" color: white; " class="btn btn-info" value="<?= $r['prenom'] ?>"/></td>
           <td style="background-color:#5bc0de;" ><input type="button" name ="email" style=" color: white; " class="btn btn-info" value="<?= $r['email'] ?>"/></td>
           <td style="background-color:#5bc0de;" ><input type="button" name ="niveau" style=" color: white; " class="btn btn-info"
               value="<?php if($r['niveau'] == 0){ echo'A valider' ;} if($r['niveau'] == -1){echo'Banni';} ?>"/></td>
           <td style="background-color:#5bc0de;" ><input type="submit" name ="valider" style=" color: white; " class="btn btn-success" value="Valider"/></td>
           <td style="background-color:#5bc0de;"><input type="submit" name ="retirer" style=" color: white; " class="btn btn-danger" value="supprimer"/></td>
    </form>
  <?php } ?>
         </tr>
       </tbody>
     </table> <?php
 }
 else{echo "<p class='btn btn-warning'><b> Aucune Inscription à valider!</b></p>";} }


 if(isset($bannis)){
   $req = $bannis->fetchAll();
   if($bannis->rowCount() > 0){
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
        <th scope="col" style="text-align: center;" >Supprimer</th>
      </tr>
    </thead> <?php
   foreach($req as $v => $r){ ?>
     <form action="inscription" method="post">
       <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
       <tbody style="border:1px solid black" >
         <tr style="border:1px solid black">
           <th scope="row" style="text-align: center; background-color:#5bc0de;" ><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
           <td style="background-color:#5bc0de;" ><input type="button" name ="nom" style=" color: white; " class="btn btn-info" value="<?= $r['nom_u'] ?>"/></td>
           <td style="background-color:#5bc0de;" ><input type="button" name ="prenom" style=" color: white; " class="btn btn-info" value="<?= $r['prenom'] ?>"/></td>
           <td style="background-color:#5bc0de;" ><input type="button" name ="email" style=" color: white; " class="btn btn-info" value="<?= $r['email'] ?>"/></td>
           <td style="background-color:#5bc0de;" ><input type="button" name ="niveau" style=" color: white; " class="btn btn-info"
               value="<?php if($r['niveau'] == 0){ echo'A valider' ;} if($r['niveau'] == -1){echo'Banni';} ?>"/></td>
           <td style="background-color:#5bc0de;" ><input type="submit" name ="valider" style=" color: white; " class="btn btn-success" value="Valider"/></td>
           <td style="background-color:#5bc0de;"><input type="submit" name ="retirer" style=" color: white; " class="btn btn-danger" value="supprimer"/></td>
    </form>
  <?php } ?>
         </tr>
       </tbody>
     </table> <?php
 }
 else{echo "<p class='btn btn-warning'><b> Aucune Utilisateur banni!</b></p>";}
}


  if(isset($user) && !isset($aValider) && !isset($bannis)){
    $req = $user->getListInscrit()->fetchAll();
    if($user->getListInscrit()->rowCount() >= 1){
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
         <th scope="col" style="text-align: center;" >Supprimer</th>
       </tr>
     </thead> <?php
    foreach($req as $v => $r){ ?>
      <form action="inscription" method="post">
        <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
        <tbody style="border:1px solid black" >
          <tr style="border:1px solid black">
            <th scope="row" style="text-align: center; background-color:#5bc0de;" ><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
            <td style="background-color:#5bc0de;" ><input type="button" name ="nom" style=" color: white; " class="btn btn-info" value="<?= $r['nom_u'] ?>"/></td>
            <td style="background-color:#5bc0de;" ><input type="button" name ="prenom" style=" color: white; " class="btn btn-info" value="<?= $r['prenom'] ?>"/></td>
            <td style="background-color:#5bc0de;" ><input type="button" name ="email" style=" color: white; " class="btn btn-info" value="<?= $r['email'] ?>"/></td>
            <td style="background-color:#5bc0de;" ><input type="button" name ="niveau" style=" color: white; " class="btn btn-info"
                value="<?php if($r['niveau'] == 0){ echo'A valider' ;} if($r['niveau'] == -1){echo'Banni';} ?>"/></td>
            <td style="background-color:#5bc0de;" ><input type="submit" name ="valider" style=" color: white; " class="btn btn-success" value="Valider"/></td>
            <td style="background-color:#5bc0de;"><input type="submit" name ="retirer" style=" color: white; " class="btn btn-danger" value="supprimer"/></td>
     </form>
   <?php } ?>
          </tr>
        </tbody>
      </table> <?php
    }
    else{echo "<p class='btn btn-warning'><b> Aucune Nouvelle inscription!</b></p>";}
  }


  ?>
 <br>
 <br/>
</div>
<?php }
        else{ echo "<p class='btn btn-warning'><b>Vous ne disposez pas des drois nécessaires pour accéder à cette page.</b></p>"; }?>
