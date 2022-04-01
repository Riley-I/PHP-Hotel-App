<?php
//THIS PAGE IS FOR USERS VIEWING RESERVATIONS
// Initialize the session
if ( ! session_id() ) {
session_start();
   }

require_once "config/connectdb.php";
?>

<!DOCTYPE html>
<html>
  <head>
        <title>Backwoods Lodge View Res</title>
        <meta charset="UTF-8">
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
 
        <div class="w3-container" id="view">

                <?php

                $UserID = $_SESSION['id'];//get current username

                $sql = "SELECT BookingID, RoomID, Checkin, Checkout, BookingStatus, created_at FROM Bookings WHERE UserId = '$UserID'";

                $statement = $pdo->query($sql);

                  while($row = $statement->fetch(PDO::FETCH_ASSOC)) { //loop through rows 
                         echo "<strong>Booking ID</strong>" . ": " . $row['BookingID'] . " | " . " <strong>Room Number</strong>" . ": " . $row['RoomID'] . " | " . " <strong>Checkin Date</strong>" . ": " . $row['Checkin'] . " | " . " <strong>Checkout Date</strong>" . ": " . $row['Checkout'] . " | " ." <strong>BookingStatus</strong>" . ": " . $row['BookingStatus'] . " | " . " <strong>Booking Made</strong> " . ": " . $row['created_at'] . ' <br> ' . ' <br> '; 

                  }
                ?> 
  </div>
 
  <div class="w3-container" id="contact"> 
    <p>To Cancel a Reservation, Please Contact Us!</p>
    <i class="fa fa-map-marker w3-text-teal" style="width:30px"></i> Nelson BC<br>
    <i class="fa fa-phone w3-text-teal" style="width:30px"></i> Phone: 250 BCK WOOD<br>
    <i class="fa fa-envelope w3-text-teal" style="width:30px"> </i> Email: info@backwoodslodge.com<br>
  </div>
  
  <a href="index.php">
  Go back home
  </a>
  
  
</html>