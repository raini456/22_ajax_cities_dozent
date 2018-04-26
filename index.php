<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>PHP 21 Ajax Muster</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="assets/css/styles.css">    
  <script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/ajax.js" type="text/javascript"></script>
 </head>
 <body>
  <div class="container">
   <h1>City Data</h1>
   <hr>
   <label>
    <select name="country" class="form-control">
     <option>Please select a country</option>
    </select>
   </label>

   <label>
    <select name="province" class="form-control">
     <option>Please select a province</option>
    </select>
   </label>

   <label>
    <select name="city" class="form-control">
     <option>Please select a city</option>
    </select>
   </label>

   <hr>
   <h2>City Info</h2>
   <hr>
   <table class="table">
    <thead>
     <tr>

     </tr>
    </thead>
    <tbody>
     <tr>

     </tr>
    </tbody>
   </table>
  
   <!--<a target="_blank" class="btn btn-info" href="https://www.google.com.br/maps/place/Astarte+Suites/@37.3812205,25.3884172,13z/data=!4m7!3m6!1s0x0:0x2026db230b52185a!5m1!1s2018-05-19!8m2!3d36.3635912!4d25.3861105">MAP</a>-->
   
   <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25698.53769024097!2d29.412192377327916!3d37.37731422240178!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzbCsDIyJzM4LjMiTiAyNcKwMjUnNDYuOSJF!5e0!3m2!1sde!2sde!4v1524727074662" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>-->
  </div>
  <!--<button data-lat="" data-lon="" id="mapbtn" type="button">Port Andratx</button>-->
  <div id="map"></div>

  <script src="assets/js/main.js" type="text/javascript"></script>
  <script>
//   var btn = document.querySelector('#mapbtn');
//   btn.addEventListener('click', function () {
//    initMap(39.543520, 2.387313);
//   });
   
   var LAT = 42.141874;
   var LON = 9.536978;
   
   function initMap() {
    
    if (arguments.length === 2) {
     LAT = arguments[0];
     LON = arguments[1];
    }
    
    // Create a map object and specify the DOM element for display.
    var pos = {lat: LAT, lng: LON};
    var map = new google.maps.Map(document.getElementById('map'), {
     center: pos, //42.141874, 9.536978
     zoom: 8
    });
    var marker = new google.maps.Marker({
     position: pos,
     map: map
    });
   }

  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuP_m2YE-E2FAgwzsK_ZO3YDeqw0oRSHM&callback=initMap"
  async defer></script>
 </body>
</html>
