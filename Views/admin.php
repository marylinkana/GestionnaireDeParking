<div style="margin-left:100px">
  <p style="color: black; font-size:50px;">INSCRIPTIONS A VALDER</p>
   <?php
            $req = getListInscrit()->fetchAll();
    foreach($req as $v => $r){ ?>
      <form action="admin" method="post">
          <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
          <input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/>
          <input type="button" name ="nom" style=" color: white; " class="btn btn-info" value="<?='Nom : '.$r['nom']?>"/>
          <input type="button" name ="prenom" style=" color: white; " class="btn btn-info" value="<?='Prenom : '.$r['prenom']?>"/>
          <input type="button" name ="email" style=" color: white; " class="btn btn-info" value="<?='Email : '.$r['email']?>"/>
          <input type="button" name ="niveau" style=" color: white; " class="btn btn-info" value="<?='Niveau : '.$r['niveau']?>"/><br>
          <input type="submit" name ="valider" style=" color: white; " class="btn btn-success" value="Valider l'inscription"/>
     </form>
     <br>
    <?php } ?>
</div>
<div style="margin-left:100px">
  <p style="color: black; font-size:50px;">LISTE DES UTILISATEURS</p>
   <?php
            $req = getListUser()->fetchAll();
    foreach($req as $v => $r){ ?>
      <form action="admin" method="post">
          <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_u'] ?>"/>
          <input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/>
          <input type="button" name ="nom" style=" color: white; " class="btn btn-info" value="<?='Nom : '.$r['nom']?>"/>
          <input type="button" name ="prenom" style=" color: white; " class="btn btn-info" value="<?='Prenom : '.$r['prenom']?>"/>
          <input type="button" name ="email" style=" color: white; " class="btn btn-info" value="<?='Email : '.$r['email']?>"/>
          <input type="button" name ="niveau" style=" color: white; " class="btn btn-info" value="<?='Niveau : '.$r['niveau']?>"/><br>
          <input type="submit" name ="annuler" style=" color: white; " class="btn btn-danger" value="Annuler l'inscription"/>
     </form>
     <br>
    <?php } ?>
</div>

<div style="margin-left:100px">
  <p style="color: black; font-size:50px;">LISTE DES PLACES</p>
  <form action="admin" method="post">
    <input type="text" name ="nom" style=" color: black; " class="btn btn-secondary" />
    <input type="submit" name ="ajouter" style=" color: white; " class="btn btn-success" value="Ajouter"/>
 </form>
 <br>
   <?php
            $req = getListPlaces()->fetchAll();
    foreach($req as $v => $r){ ?>
      <form action="admin" method="post">
          <input type="hidden" name ="id_u" style=" color: white; " class="btn btn-info" value="<?= $r['id_p'] ?>"/>
          <input type="button" name ="num" style=" color: white; " class="btn btn-info" value="<?= $v++ ?>"/>
          <input type="button" name ="nom" style=" color: white; " class="btn btn-info" value="<?='Nom : '.$r['nom']?>"/>
          <input type="submit" name ="annuler" style=" color: white; " class="btn btn-danger" value="Supprimer"/>
     </form>
     <br>
    <?php } ?>
</div>
