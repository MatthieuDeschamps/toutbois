<?php
function afficheMenu($niveau) {
?>
    <nav class="navbar navbar-default  navbar-fixed-top" role="navigation">
        <div class="container">
            
            <div class="navbar-header">
                
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    
                </button>
                <a class="navbar-brand" href="<?php for($i=0;$i<$niveau;$i++){echo '../';} ?>index.php">TOUTBOIS</a>
            </div>
            
            <div class="navbar-collapse collapse in navbar-right" aria-expanded="false" id="navbar">
                <ul class="nav navbar-nav">
                    <?php if (!isset($_SESSION['id'])) { ?>
                    <li>
                        <a href="<?php for($i=0;$i<$niveau-1;$i++){echo '../';} ?>identification.php">Catalogue</a>
                    </li>
                    <?php }else {?>
                      <li>
                            <a href="<?php for($i=0;$i<$niveau-1;$i++){echo '../';} ?>catalogue.php">Catalogue</a>
                        </li>
                      <?php  }?>
                    
                    <li>
                        <a href="#">Panier</a>
                    </li>
                    <?php if (!isset($_SESSION['id'])) { ?>
                    <li>
                        <a href="<?php for($i=0;$i<$niveau-1;$i++){echo '../';} ?>identification.php">Login</a>
                    </li>
                    <?php } ?>
                    <?php if (isset($_SESSION['id'])) { ?>
                    <li>
                        <a href="<?php for($i=0;$i<$niveau-1;$i++){echo '../';} ?>deconnexion.php">Déconnexion</a>
                    </li>
                    <?php } ?>
                    <?php if (isset($_SESSION['admin']) && $_SESSION['admin']===1) { ?>
                    <li>
                        <a href="admin/backoffice.php">Espace administration</a>
                    </li>
                    <?php } ?>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container -->
        
    </nav>
<?php
}
?>