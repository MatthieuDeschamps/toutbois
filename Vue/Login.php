<?php function afficheLogin() { 
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-lg-12 col-md-12">
            <img src="../img/logo/logo-01.png" class="img-responsive img-responsive-margin" alt="Logo ToutBois">
        </div>
    </div>        
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-push-2 col-md-4 col-md-push-4 col-lg-4 col-lg-push-4">
            <form class="form-signin" method="post" action="../Controlleur/identificationTraitement.php">
                <input type="text" id="inputEmail" class="form-control" name="login" placeholder="Login" required autofocus>
                <input type="password" id="inputPassword" name="motDePasse" class="form-control" placeholder="Mot de passe" required>
                <hr>
                <button class="btn btn-lg btn-success btn-block" type="submit">Connection</button>
                <hr>
            </form>
        </div>        
    </div> 
</div>
<?php 
} 
?>