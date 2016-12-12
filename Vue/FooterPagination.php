<?php
function afficheFooter($pages) { ?>

<footer>
<div class="container">
        <div class="row">
            <address class="col-sm-3 col-lg-3 col-md-3">
               <p>20 Rue du Luxembourg<br>
                59100 Roubaix<br>
                France</p> 
            </address>
    
            <div class="col-sm-6 col-lg-6 col-md-6">
                <p class="paraCentre">Contact information</p>
                    <ul class="list-inline center-block text-center">
                                        <li><a href="https://www.instagram.com/_deschampsmatthieu_/"><span class="fa fa-instagram fa-3x"></span></a></li>
                                        <li><a href="http://deschampsmatthieu.tumblr.com/"><span class="fa fa-tumblr-square fa-3x"></span></a></li>
                                        <li><a href="https://plus.google.com/u/2/104855726051683727224"><span class="fa fa-google-plus-square fa-3x"></span></a></li>
                                        <li><a href="https://github.com/MatthieuDeschamps"><span class="fa fa-github-square fa-3x"></span></a></li>
                    </ul>
            </div>
            <div class="col-sm-3 col-lg-3 col-md-3">
                <h4 class="h4footer"> Réalisation du site</h4>
                <p class="paraRight">&copy; 2016-2017 SSII MGc production</p>
            </div>
        </div>
    </div>
</footer>
 <script src="../jquery-3.1.1.js"></script>
<script src="../css/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="../bootpag.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#bodyCatalogue").load("../Controlleur/fetch_pages.php");  //initial page number to load
	$(".pagination").bootpag({
	   total: <?php echo $pages ?>,
	   page: 1,
	   maxVisible: 5
	}).on("page", function(e, num){
		e.preventDefault();
		$("#bodyCatalogue").load("fetch_pages.php", {'page':num});
	});

});
</script>   
</body>
</html>
<?php
}
?>