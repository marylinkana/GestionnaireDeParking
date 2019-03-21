    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">


          <form method="post">
            <div class="form-group">

              <div class="form-label-group">
                <input type="email" id="inputEmail" name="mail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                <label for="inputEmail">Email address</label>
              </div>

            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="mdp" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="remember" value="remember-me">
                  Se souvenir de moi
                </label>
              </div>
            </div>
            <button class="btn btn-primary btn-block" name="submit">Login</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="register">Register an Account</a>
            <a class="d-block small" href="forgot-password">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>