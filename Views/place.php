<?php //$file->outOfFile();
  if(isset($_SESSION['niveau']) && $_SESSION['niveau'] == 2){?>

      <div id="disp" class="text-center" style="display:block">
          <p style="color: black; font-size:50px;">PLACES DISPONIBLES</p>
          <form action="place" method="post">
            <input type="text" name ="recherche_place" style=" color: black; " class="btn btn-secondary" placeholder="recherche" />
            <input type="submit" name ="recherchePlace" style=" color: white; " class="btn btn-success" value="Rechercher"/>
          </form>
          <hr>
           <?php
           if(isset($recherchePlace)){
             $req = $recherchePlace->fetchAll();
             ?>
             <table class="table table-bordered bordered-dark" style="border:1px solid black;">
              <thead class="" style="background-color:black;">
                <tr style="text-align: center;">
                  <th scope="col" style="text-align: center;" >#</th>
                  <th scope="col" style="text-align: center;" >Places</th>
                  <th scope="col" style="text-align: center;" >Couts</th>
                  <th scope="col" style="text-align: center;" >Attribuer à</th>
                  <th scope="col" style="text-align: center;" >Attibuer</th>

                </tr>
              </thead> <?php
             foreach($req as $v => $r){ ?>
               <form action="place" method="post">
                 <input type="hidden" name ="id_p" style=" color: white; " class="btn btn-info" value="<?= $r['id_p'] ?> "/>
                 <tbody style="border:1px solid black" >
                   <tr style="border:1px solid black">
                     <th scope="row" style="text-align: center; background-color:#5bc0de;" >
                       <input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
                       <td style="background-color:#5bc0de;">
                         <input type="button" name ="nom_p" style=" color: white; " class="btn btn-info" value="<?=$r['nom_p']?>"/></td>
                       <td style="background-color:#5bc0de;">
                         <input type="button" name ="nom_p" style=" color: white; " class="btn btn-info" value="<?=$r['prix'].'€/h'?>"/></td>
                       <td style="background-color:#5bc0de;">
                         <select type="select" style=" color: black; " class="btn btn-light" name="id_u">
                            <?php $userList = $user->getListUser()->fetchAll();
                            foreach($userList as $v => $u){?>
                              <option value="<?= $u['id_u'] ?>" > <?=$u['nom_u']." ".$u['prenom']." ".$u['email'] ?></option>
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
              }
           }
           else{
            $req = $place->getListPlacesDispo()->fetchAll();
            ?>
            <table class="table table-bordered bordered-dark" style="border:1px solid black;">
             <thead class="" style="background-color:black;">
               <tr style="text-align: center;">
                 <th scope="col" style="text-align: center;" >#</th>
                 <th scope="col" style="text-align: center;" >Places</th>
                 <th scope="col" style="text-align: center;" >Coûts</th>
                 <th scope="col" style="text-align: center;" >Attribuer à</th>
                 <th scope="col" style="text-align: center;" >Attibuer</th>

               </tr>
             </thead> <?php
            foreach($req as $v => $r){ ?>
              <form action="place" method="post">
                <input type="hidden" name ="id_p" style=" color: white; " class="btn btn-info" value="<?= $r['id_p'] ?> "/>
                <tbody style="border:1px solid black" >
                  <tr style="border:1px solid black">
                    <th scope="row" style="text-align: center; background-color:#5bc0de;" >
                      <input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
                      <td style="background-color:#5bc0de;">
                        <input type="button" name ="nom_p" style=" color: white; " class="btn btn-info" value="<?=$r['nom_p']?>"/></td>
                      <td style="background-color:#5bc0de;">
                        <input type="button" name ="nom_p" style=" color: white; " class="btn btn-info" value="<?=$r['prix'].'€/h'?>"/></td>
                      <td style="background-color:#5bc0de;">
                        <select type="select" style=" color: black; " class="btn btn-light" name="id_u">
                           <?php $userList = $user->getListUser()->fetchAll();
                           foreach($userList as $v => $u){?>
                             <option value="<?= $u['id_u'] ?>" > <?=$u['nom_u']." ".$u['prenom']." ".$u['email'] ?></option>
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
             }
           }?>
           <br>
           <br>
      </div>
<?php }
        else echo "<p class='btn btn-warning'><b>Vous ne disposez pas des drois nécessaires pour accéder à cette page.</b></p>";?>
