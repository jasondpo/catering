<?php include 'include/header.php'; ?>

  <body>
    <div id="map"></div>
    <script>

      function initMap() {
        var myLatLng = {lat: 38.931981, lng: -77.029004};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3YW8hDRZ3bIkHT_dKFHXmE-cD-mavhQQ&callback=initMap">
    </script>
  </body>
</html>