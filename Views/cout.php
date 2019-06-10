<form method="post">
  <h2 class="form-login-heading">Attribuer une catégories</h2>
  <div class="login-wrap">
    <select type="select" id="destinatair" style=" color: black; " class="form-control" name="id_p">
       <?php $placeList =  $place->getListPlaces()->fetchAll();
       foreach($placeList as $v => $u){ ?>
         <option value="<?= $u['id_p'] ?>" > <?=$u['nom_p'] ?></option>
       <?php } ?>
    </select>    <br>
    <!-- <input type="email" id="destinatair" name="destinatair" class="form-control" placeholder="Destinatair" required="required" autofocus="autofocus"> -->
    <select type="select" id="destinatair" style=" color: black; " class="form-control" name="id_c">
       <?php $categories = $reservation->getCategories()->fetchAll();
       foreach($categories as $v => $u){ ?>
         <option value="<?= $u['id_c'] ?>" > <?=$u['libelle'] ?></option>
       <?php } ?>
    </select>
    <br>
    <button class="btn btn-theme btn-block" name="attribuer" type="submit"><i class="fas fa-sing-in-alt"></i> Attribuer </button>
    <hr>
  </div>
</form>
