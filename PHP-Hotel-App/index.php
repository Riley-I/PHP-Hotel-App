<!DOCTYPE html>
<html lang="en">
  <head>
        <title>Backwoods Lodge Homepage</title>
        <meta charset="UTF-8">
              <meta name="description" content="PHP, MySQL database hotel app">
              <meta name="keywords" content="PHP, MySQL, Database, backend web-development, hotel, booking system, web developer, portfolio, dev, portfolio, student, website">
              <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="styles/styles.css">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <style>body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}</style>
    </head>
  
<body class="w3-light-grey">
  
<!-- Navigation Bar -->
<div class="w3-bar w3-white w3-large">
  <a href="index.php" class="w3-bar-item w3-button w3-teal w3-mobile"></i><img id="logo" src="images/tree-logo.png" alt="tree logo"></a>
  <a href="#rooms" class="w3-bar-item w3-button w3-mobile">Rooms</a>
  <a href="#about" class="w3-bar-item w3-button w3-mobile">About</a>
  <a href="#contact" class="w3-bar-item w3-button w3-mobile">Contact</a>
  <a href="admin-register.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Admin</a>
  <a href="user-res-manage.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">My Reservations</a>
  <a href="login.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Book Now</a>
</div>
 
  <!-- Header -->
<header class="w3-display-container w3-content" style="max-width:1500px;">
  <img class="w3-image" src="images/bg-unsplash.jpg" alt="The Hotel" style="min-width:1000px" width="1500" height="800">
  <div class="w3-display-left w3-padding w3-col l6 m8">
    <div class="w3-container w3-teal">
      <h2><i class="fa fa-bed w3-margin-right"></i>Backwoods Lodge</h2>
    </div>
    <div class="w3-container w3-white w3-padding-16">
   
  <!-----hero search---->
      <form action="query.php" method="POST">
        <div class="w3-row-padding" style="margin:0 -16px;">
          <div class="w3-half w3-margin-bottom">
            <label for="checkin1"><i class="fa fa-calendar-o"></i> Check In</label>
            <input id="checkin1" class="w3-input w3-border" type="date" placeholder="DD MM YYYY" name="checkin">
          </div>
          <div class="w3-half">
            <label for="checkout1" ><i class="fa fa-calendar-o"></i> Check Out</label>
            <input id="checkout1" class="w3-input w3-border" type="date" placeholder="DD MM YYYY" name="checkout">
          </div>
        </div>
        <div class="w3-row-padding" style="margin:8px -16px;">
          <div class="w3-half w3-margin-bottom">   
        </div>
        <button class="w3-button w3-dark-grey" type="submit"><i class="fa fa-search w3-margin-right"></i> See All Available Rooms</button>
      </form>
    </div>
  </div>
</header>
  
<!-- Page content -->
<div class="w3-content" style="max-width:1532px;">
  
  <div class="w3-container w3-margin-top" id="rooms">
    <h2>Rooms</h2>
    <p>Recharge out in Nature. Cozy and Comfortable with a side of Adventure.</p>
  </div>

  <div class="w3-row-padding w3-padding-16">
    
  <div class="w3-row-padding">
    <h3>Search Availability</h3>
  <form action="room-type-query.php" method="POST">

    <div class="w3-col m3">
      <label for="checkin2"><i class="fa fa-calendar-o"></i> Check In</label>
      <input id="checkin2" class="w3-input w3-border" type="date" placeholder="DD MM YYYY" name="checkin">
    </div>
    <div class="w3-col m3">
      <label for="checkout2"><i class="fa fa-calendar-o"></i> Check Out</label>
      <input id="checkout2" class="w3-input w3-border" type="date" placeholder="DD MM YYYY" name="checkout">
    </div>
  </div>
    
   <div class="w3-row-padding w3-padding-16">
   
    <div class="w3-third w3-margin-bottom">
      <div class="w3-container w3-white">
        <h4>Basic Room</h4>
        <h5 class="w3-opacity">From $99</h5>
        <p>Single bed</p>
        <p>15m<sup>2</sup></p>
        <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i></p>
        <button class="w3-button w3-block w3-amber w3-margin-bottom" type="submit" name="btn_submit" value="Button 1">Search Availability</button>
      </div>
    </div>
     
    <div class="w3-third w3-margin-bottom">
      <div class="w3-container w3-white">
        <h4>Family Room</h4>
        <h5 class="w3-opacity">From $199</h5>
        <p>Queen-size bed</p>
        <p>25m<sup>2</sup></p>
        <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i> <i class="fa fa-tv"></i></p>
        <button class="w3-button w3-block w3-amber w3-margin-bottom" type="submit" name="btn_submit" value="Button 2">Search Availability</button>
      </div>
    </div>
     
    <div class="w3-third w3-margin-bottom">
      <div class="w3-container w3-white">
        <h4>Accessible Rooms</h4>
        <h5 class="w3-opacity">From $149</h5>
        <p>King-size bed</p>
        <p>40m<sup>2</sup></p>
        <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i> <i class="fa fa-tv"></i> <i class="fa fa-wheelchair"></i></i></p>
        <button class="w3-button w3-block  w3-amber w3-margin-bottom" type="submit" name="btn_submit" value="Button 3">Search Availability</button>
      </div>
    </div>
    </form>
  </div>
 
  <div class="w3-row-padding" id="about">
    <div class="w3-col l4 12">
      <h3>About</h3>
      <h4>Backwoods Lodge is a <strong>family-friendly</strong>, rustic boutique rental along the scenic Kootenay lake between <strong>Nelson and Kaslo</strong>. It is tucked in the woods but overlooking the lake.</p>
      <p>Guests can choose between the <strong>Family Cabin</strong> for groups or the <strong>Getaway (aka Basic) Cabin</strong> for couples. 
      There are currently only 5 rooms/cabins on the property, which makes the Backwoods Cabins an exclusive rental that books up months in advance. </p>
      <p>Backwoods is within driving distance from both Nelson and Kaslo with hiking and <strong>kayaking in the summer, skiing in the winter</strong>, and Ainsworth hot springs year round.</p></h4>
    <p>We accept: <i class="fa fa-credit-card w3-large"></i> <i class="fa fa-cc-mastercard w3-large"></i> <i class="fa fa-cc-amex w3-large"></i> <i class="fa fa-cc-cc-visa w3-large"></i><i class="fa fa-cc-paypal w3-large"></i></p>
    </div>
    <div class="w3-col l8 12">
      <!-- Image of location/map -->
      <img src="images/pexels-backwoods-photo.jpg" alt="nature photo of Kootenay Lake" class="w3-image w3-greyscale" style="width:100%;">
    </div>
  </div>
  
  <div class="w3-row-padding w3-large w3-center" style="margin:32px 0">
    <div class="w3-third"><i class="fa fa-map-marker w3-text-teal"></i> Kootenay Lake, BC, CA</div>
    <div class="w3-third"><i class="fa fa-phone w3-text-teal"></i> Phone: 250-BCK-WOOD</div>
    <div class="w3-third"><i class="fa fa-envelope w3-text-teal"></i> Email: info@backwoodslodge.com</div>
  </div>

  <div class="w3-panel w3-teal w3-leftbar w3-padding-32">
    <h6><i class="fa fa-info .w3-orange w3-padding w3-margin-right"></i> Per request, we can provide kayaks, paddle boards etc.</h6>
  </div>


  <div class="w3-container" id="contact">
    <h3>Contact</h3>
    <p>If you have any questions, do not hesitate to ask us.</p>
    <i class="fa fa-map-marker w3-text-teal" style="width:30px"></i> Kootenay Lake, BC, CA<br>
    <i class="fa fa-phone w3-text-teal" style="width:30px"></i> Phone: 250-BCK-WOOD<br>
    <i class="fa fa-envelope w3-text-teal" style="width:30px"> </i> Email: info@backwoodslodge.com<br>
  </div>
</div>
<!-- End page content -->

  <div id="googleMap" style="width:100%;height:400px;"></div>
  <img id="logofooter" alt="dark tree logo" src="images/tree-logo.png" alt="tree logo">
  
  <?php include 'footer.php'; ?>

  
<!-- Add Google Maps -->
<script>
function myMap() {
  myCenter=new google.maps.LatLng(49.6026135742925, -116.83641013344932);
  var mapOptions= {
    center:myCenter,
    zoom:12, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  var marker = new google.maps.Marker({
    position: myCenter,
  });
  marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAs4SvUBFVxCiXAiAlG7-RFG4vT_SKz7r0&callback=myMap"></script>