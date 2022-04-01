<?php
//THIS PAGE IS FOR Cancelling A RESERVATION
// Initialize the session
if ( ! session_id() ) {
  session_start();
  }

require_once "config/connectdb.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
        <title>Admin Cancel</title>
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

  </body>
  </html>

 <?php
     //GET ALL INFO FOR ALL BOOKINGS 
     $BookingID = $_POST['bookingid'];//get booking id from form
        //echo $BookingID;

    //QUERY 1 GET BOOKING STATUS
      $BookingStatus = "";

        $sql = "SELECT BookingStatus FROM Bookings WHERE BookingID = '$BookingID'";
        $statement = $pdo->query($sql);

        while($row = $statement->fetch(PDO::FETCH_ASSOC)) { //loop through rows 
               //echo "Booking Status is" . ": " . $row['BookingStatus'] . " for. $BookingID";
  
              $BookingStatus = $row['BookingStatus'];
           };
  
           if ($BookingStatus == "active") {
                $sql = "UPDATE Bookings SET BookingStatus = 'cancelled' WHERE BookingID = '$BookingID'";
                $statement = $pdo->query($sql);
      
          echo "Success! Booking ID" . ": " . $BookingID . " has been cancelled.";

    } else {
      echo "That Booking has Already been Cancelled!";
    };

       ?>

  <a href="admin-welcome.php">Go Back to admin dashboard.</a>