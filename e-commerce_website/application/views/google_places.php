
<!DOCTYPE html>
<html>
  <head>
    <title>Place searches</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0;
        padding: 0;
      }

    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    <script>
var map;
var infowindow;

function initialize() {
  var pyrmont = new google.maps.LatLng(37.354107, -121.9552386);

  map = new google.maps.Map(document.getElementById('map-canvas'), {
    center: pyrmont,
    zoom: 15

  });

  // $category_id = 5; // comment this.
  // $product_id = 2; // comment this.
// <?php var_dump($product); die(); ?>
  // $category_id = $category; // uncomment this.
  // $product_id = $product; // uncomment this.

  if($category_id == 1)
  {
    if($product_id % 2 == 0)
    {
      $store = "Target";
    }
    else
    {
      $store = "Walmart";
    }
  }

   else if($category_id == 2)
  {
    if($product_id % 2 == 0)
    {
      $store = "Ross Dress for Less";
    }
    else
    {
      $store = "Talbots";
    }
  }

   else if($category_id == 3)
  {
    if($product_id % 2 == 0)
    {
      $store = "Marshalls";
    }
    else
    {
      $store = "T. J. Maxx and HomeGoods";
    }
  }

 else if($category_id == 4)
  {
    if($product_id % 2 == 0)
    {
      $store = "Kohl's";
    }
    else
    {
      $store = "T. J. Maxx and HomeGoods";
    }
  }

  else if($category_id == 5)
  {
    if($product_id % 2 == 0)
    {
      $store = "Macy's";
    }
    else
    {
      $store = "Target";
    }
  }

  var request = {
    location: pyrmont,
    radius: 5000,
    types: ['department_store'],
    name: [$store]
  };

  infowindow = new google.maps.InfoWindow();
  var service = new google.maps.places.PlacesService(map);
  service.nearbySearch(request, callback);
}

function callback(results, status) {
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker(results[i]);
    }
  }
}

function createMarker(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>