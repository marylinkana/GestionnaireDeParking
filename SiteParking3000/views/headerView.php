
<header>
         <a href="accueilView.php">Accueil</a>
        <?php if(isset($_SESSION['connecte']))
        {
            echo"<li><a href='logoutView.php'>Logout</a></li>";
        }
        else
        {
            echo '<li><a href="loginView.php"><span><font>Login</font></span></a></li>';

        }
        ?>

        <li><a href="insView.php"><span><font>Inscription</font></span></a></li>


         <a href="adminView.php">Admin</a> <br/>
    </header>
