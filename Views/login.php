
  <form method="post">
    <h2 class="form-login-heading">Login</h2>
    <div class="login-wrap">
      <input type="email" id="email" name="email" class="form-control" value="admin.parking@m2l.com" required="required" autofocus="autofocus">
      <br>
      <input type="password" id="password" name="mdp" class="form-control" value="azerty" required="required">
      <label class="checkbox">
        <input type="checkbox" name="remember" value="remember-me"> Remember me
        </label>
      <input class="btn btn-theme btn-block" type="submit" name="login"  value="Login">
      <hr>
      <div class="registration">
        Pas encore inscrit ?<br/>
        <a class="btn btn-theme" href="register"> s'inscrire </a>
      </div>
      <br>
      <div class="registration">
        Mot de passe oublié ?<br/>
        <a class="btn btn-theme" href="reset"> Réinitialiser </a>
      </div>
    </div>
  </form>

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/backgroundaccueil.jpg", {
      speed: 500
    });
  </script>
