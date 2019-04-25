<?php //$file->outOfFile();
  if(isset($_SESSION['niveau']) && $_SESSION['niveau'] == 2){?>

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
       <th scope="col" style="text-align: center;" >Déplacer</th>
       <th scope="col" style="text-align: center;" >Supprimer</th>
     </tr>
   </thead> <?php
  $req = $file->getFileList()->fetchAll();
  foreach($req as $v => $r){ ?>
    <form action="file" method="post">
      <input type="hidden" name ="rang" style=" color: white; " class="btn btn-info" value="<?= $r['rang'] ?>"/>
      <tbody style="border:1px solid black" >
        <tr style="border:1px solid black">
          <th scope="row" style="text-align: center; background-color:#5bc0de;" ><input type="button" name ="rang" style=" color: white; " class="btn btn-info" value="<?= $r['rang'] ?>"/></th>
          <td style="background-color:#5bc0de;"><input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?=$r['nom_u']?>"/></td>
          <td style="background-color:#5bc0de;"><input type="submit" name ="deplacer" style=" color: white; " class="btn btn-warning" value="Déplacer"/></td>
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
<?php }
        else echo "<p class='btn btn-warning'><b>Vous ne disposez pas des drois nécessaires pour accéder à cette page.</b></p>";?>
