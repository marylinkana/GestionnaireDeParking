<form method="post">
  <h2 class="form-login-heading">Envoyer un mail</h2>
  <div class="login-wrap">
    <input type="email" id="expediteur" name="expediteur" class="form-control" value="<?= $_SESSION['email'] ?>" required="required" readonly="true">
    <br>
    <input type="email" id="destinatair" name="destinatair" class="form-control" placeholder="Destinatair" required="required" autofocus="autofocus">
    <br>
    <input type="text" id="objet" name="objet" class="form-control" placeholder="Objet" required="required" >
    <br>
    <TEXTAREA type="text" id="corp" name="corp" class="form-control" placeholder="Message" required="required" rows=5 cols=30></TEXTAREA>
    <br>
    <button class="btn btn-theme btn-block" name="send" type="submit"><i class="fa fa-send"></i> Envoyer </button>
    <hr>
  </div>
</form>
