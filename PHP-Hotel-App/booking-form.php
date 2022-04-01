<!DOCTYPE html>
<html lang="en">
  <head>
        <title>Backwoods Lodge User</title>
        <meta charset="UTF-8">
              <meta name="description" content="PHP, MySQL database hotel app">
              <meta name="keywords" content="PHP, MySQL, Database, backend web-development, hotel, booking system, web developer, portfolio, dev, portfolio, student, website">
              <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="styles/styles.css">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <style>body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}</style>
    </head>
    
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
    
      <?php include 'header.php'; ?>

  <body>

  <div class="w3-container" id="book">
    <h1>STEP 2</h1>
    <h2>Book Reservation</h2>
    
     <a href="index.php">Not sure what room to book? <br> You can also book from the homepage - go there now.</a>
   
    <form action="add.php" method="POST" role="form">
      <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="Room Number" name="room"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="date" placeholder="YY MM DD" name="checkin"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="date" placeholder="YY MM DD" name="checkout"></p>
      
      <p><button class="w3-button w3-black w3-padding-large" type="submit">Book Now</button></p>
    </form>
    
    <a href="index.php">Booking Complete!- Go Back Home.</a>
  </div>
    
    <div class="w3-container" id="contact">
        <p>If you have any questions, do not hesitate to contact us!</p>
      <i class="fa fa-map-marker w3-text-teal" style="width:30px"></i> Nelson BC<br>
      <i class="fa fa-phone w3-text-teal" style="width:30px"></i> Phone: 250 BCK WOOD<br>
      <i class="fa fa-envelope w3-text-teal" style="width:30px"> </i> Email: info@backwoodslodge.com<br>
      
    </div>
    
     <p id=reset>
        <a href="admin-reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="admin-logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
  
  <?php include 'footer.php'; ?>
</body>
</html>