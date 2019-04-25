<?php //$file->outOfFile();
  if(isset($_SESSION['niveau']) && $_SESSION['niveau'] == 2){?>

    <div id="cree" class="text-center" style="display:block">
      <p style="color: black; font-size:50px;">NOUVELLE PLACES</p>
      <form action="newPlace" method="post">
        <input type="text" name ="nom" style=" color: black; " class="btn btn-secondary" placeholder="Nom de la place"/>
        <input type="submit" name ="recherchePlace" style=" color: white; " class="btn btn-success" value="Rechercher"/>
        <input type="submit" name ="ajouter" style=" color: white; " class="btn btn-success" value="Ajouter"/>
        <hr>
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
         <form action="newPlace" method="post">
           <input type="hidden" name ="id_p" style=" color: white; " class="btn btn-info" value="<?= $r['id_p'] ?> "/>
           <tbody style="border:1px solid black" >
             <tr style="border:1px solid black">
               <th scope="row" style="text-align: center; background-color:#5bc0de;" ><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/></th>
               <td style="background-color:#5bc0de;"><input type="button" name ="nom_p" style=" color: white; " class="btn btn-info" value="<?=$r['nom_p']?>"/></td>
               <td style="background-color:#5bc0de;"><input type="submit" name ="supprimer" style=" color: white; " class="btn btn-danger" value="Supprimer"/></td>

        </form>
      <?php } ?>
             </tr>
           </tbody>
         </table> <?php ?>
       <br>
    </div>
    <?php }
            else echo "<p class='btn btn-warning'><b>Vous ne disposez pas des drois nécessaires pour accéder à cette page.</b></p>";?>
