<?php //$file->outOfFile();
  if(isset($_SESSION['niveau']) && $_SESSION['niveau'] == 2){?>

    <div id="user" class="text-center" style="display:block">
      <p style="color: black; font-size:50px;">UTILISATEURS</p>
      <form action="utilisateur" method="post">
        <input type="text" name ="recherche_user" style=" color: black; " class="btn btn-secondary" placeholder="recherche" />
        <input type="submit" name ="rechercheUser" style=" color: white; " class="btn btn-success" value="Rechercher"/>
      </form>
      <hr>
       <?php
       if(isset($rechercheUser)){
         //var_dump($rechercheInsc);
         $req = $rechercheUser->fetchAll();
         //var_dump($req);
         if($rechercheUser->rowCount() > 0){
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
             </tr>
           </thead> <?php
          foreach($req as $v => $r){ ?>
            <form action="utilisateur" method="post">
                <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
                <input type="hidden" name ="mdp" style=" color: white; " class="btn btn-info" value="azerty"/>
                <input type="hidden" name ="email" style=" color: white; " class="btn btn-info" value="<?= $r['email'] ?>"/>
                <tbody style="border:1px solid black" >
                  <tr style="border:1px solid black">
                    <th scope="row" style="text-align: center; background-color:#5bc0de;" ><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
                    <td style="background-color:#5bc0de;"><input type="button" name ="nom" style=" color: white; " class="btn btn-info" value="<?= $r['nom_u'] ?>"/></td>
                    <td style="background-color:#5bc0de;"><input type="button" name ="prenom" style=" color: white; " class="btn btn-info" value="<?= $r['prenom'] ?>"/></td>
                    <td style="background-color:#5bc0de;"><input type="button" name ="email" style=" color: white; " class="btn btn-info" value="<?= $r['email'] ?>"/></td>
                    <td style="background-color:#5bc0de;"><input type="button" name ="niveau" style=" color: white; " class="btn btn-info"
                      value="<?php if($r['niveau'] == 1){ echo'Utilisateur' ;} if($r['niveau'] == 2){echo'utilisateuristrateur';} ?>"/></td>
                    <td style="background-color:#5bc0de;"><input type="submit" name ="reset" style=" color: white; " class="btn btn-warning" value="Réinitialiser"/></td>
                    <td style="background-color:#5bc0de;"><input type="submit" name ="bannir" style=" color: white; " class="btn btn-danger" value="Bannir"/></td>
           </form>
         <?php } ?>
                </tr>
              </tbody>
            </table> <?php
       }
       else{echo "<p class='btn btn-warning'><b> Aucune résultat trouvé pour ".$_POST['recherche_user']." !</b></p>";}
     }
     else {
       //var_dump($rechercheInsc);
       $req = $user->getListUser()->fetchAll();
       //var_dump($req);
       if($user->getListUser()->rowCount() > 0){
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
           </tr>
         </thead> <?php
        foreach($req as $v => $r){ ?>
          <form action="utilisateur" method="post">
              <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
              <input type="hidden" name ="mdp" style=" color: white; " class="btn btn-info" value="azerty"/>
              <input type="hidden" name ="email" style=" color: white; " class="btn btn-info" value="<?= $r['email'] ?>"/>
              <tbody style="border:1px solid black" >
                <tr style="border:1px solid black">
                  <th scope="row" style="text-align: center; background-color:#5bc0de;" ><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
                  <td style="background-color:#5bc0de;"><input type="button" name ="nom" style=" color: white; " class="btn btn-info" value="<?= $r['nom_u'] ?>"/></td>
                  <td style="background-color:#5bc0de;"><input type="button" name ="prenom" style=" color: white; " class="btn btn-info" value="<?= $r['prenom'] ?>"/></td>
                  <td style="background-color:#5bc0de;"><input type="button" name ="email" style=" color: white; " class="btn btn-info" value="<?= $r['email'] ?>"/></td>
                  <td style="background-color:#5bc0de;"><input type="button" name ="niveau" style=" color: white; " class="btn btn-info"
                      value="<?php if($r['niveau'] == 1){ echo'Utilisateur' ;} if($r['niveau'] == 2){echo'utilisateuristrateur';} ?>"/></td>
                  <td style="background-color:#5bc0de;"><input type="submit" name ="reset" style=" color: white; " class="btn btn-warning" value="Réinitialiser"/></td>
                  <td style="background-color:#5bc0de;"><input type="submit" name ="bannir" style=" color: white; " class="btn btn-danger" value="Bannir"/></td>
         </form>
       <?php } ?>
              </tr>
            </tbody>
          </table> <?php
     }
     else{echo "<p class='btn btn-warning'><b> Aucune Utilisateur !</b></p>";}
    } ?>
         <br/>
         <br/>
    </div>

<?php }
        else echo "<p class='btn btn-warning'><b>Vous ne disposez pas des drois nécessaires pour accéder à cette page.</b></p>";?>
