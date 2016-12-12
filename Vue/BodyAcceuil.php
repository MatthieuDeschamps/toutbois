<?php
function afficheBodyAcceuil() {
  ?>
  <section id = "bodyAcceuil">
    <div class="container acceuil">
      <div class="row">
        <div class="col-md-12">
          <h1>Bienvenue chez TOUTBOIS</h1>
          <p>Meubles TOUT BOIS, c’est le magasin d’ameublement et d’intérieur à ROUBAIX
            où vous trouverez la gamme la plus variée de meubles et de la décoration
            pour aménager votre séjour, salle à manger ou chambre à coucher.</p>
            <div class="col-md-6">
            <img src="../img/logo/logo-02.png" class="img-responsive" alt="TOUTBOIS">
            </div>
            <div class="col-md-6">
            <h3>Membre de diverses organisations</h3>
            <p>Notre salle d’exposition spacieuse rassemble tout pour un intérieur complet.
              Des meubles qualitatifs de diverses marques y sont étalés dans de petits séjours, chambres et salles à manger complètement aménagés.
              De plus, notre offre de meubles est complétée par la décoration et l’éclairage.<br/>
              Vous avez vu le meuble de vos rêves sur notre site web ? Ajoutez-le à votre liste que vous pouvez imprimer ou nous envoyer en ligne.
              Lorsque vous visitez notre magasin d’ameublement, nos spécialistes d’intérieur savent immédiatement de quel meuble il s’agit et
              ils peuvent vous aider toute de suite. Pratique, non ?.</p>
              <h3>Tout pour un intérieur complet</h3>
              <p>En tant que magasin d’intérieur spécialisé, TOUTBOIS est membre d’Europe Meubles, du Conseil du Sommeil  et de la Garantie Meubles.
                Ainsi nous vous offrons toujours le prix le plus bas et vous garantissons la meilleure qualité et un service après-vente solide.
                D’où notre devise : Meubles TOUT BOIS, le petit plus qui fait la différence !
                Vous êtes la bienvenue dans notre magasin d’ameublement à ROUBAIX.<br/>
                Laissez-vous inspirer par notre offre dans une ambiance familiale et détendue.
                Pour finir votre visite, vous pouvez prendre un verre dans notre cafétéria. À bientôt !</p>
              </div>
              <!-- Grille article-->
              <!--Chargement produit avec DAO-->
                </div>
            </div>
          </div>
        </section>


        <section id="contact">
          <div class="container maps">

            <div class="row">
              <div class="col-md-12">
                <h3> Nous trouver </h3>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 carte">
                <div id="map" style="width:100%;height:500px"></div>
              </div>
            </div>


          </div>
        </section>


        <script>
        function myMap() {
          var myCenter = new google.maps.LatLng(50.693163, 3.158795);
          var mapCanvas = document.getElementById("map");
          var mapOptions = {center: myCenter, zoom: 15};
          var map = new google.maps.Map(mapCanvas, mapOptions);
          var marker = new google.maps.Marker({position:myCenter});
          marker.setMap(map);


          var infowindow = new google.maps.InfoWindow({
            content: "Meuble TOUTBOIS"

          });
          infowindow.open(map,marker);
        }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSOplT1gSIMI-7slS_kIUstLDVVQyh50I&callback=myMap"></script>
        <?php
      }
      ?>
