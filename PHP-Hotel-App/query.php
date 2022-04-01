<?php
//THIS PAGE IS FOR SEARCHING AVAILABLE ROOMS FOR SPECIFIC DATES
// Initialize the session
if ( ! session_id() ) {
  session_start();
  }

require_once "config/connectdb.php";
?>

<!DOCTYPE html>
<html>
  <head>
        <title>Backwoods Lodge Query</title>
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
  
  <?php include 'header.php'; ?>

  
<div class="w3-container" id="bookings">
    <?php
    //SEARCH AVAILABLE ROOMS FOR DATES ENTERED

    //$UserID = $_SESSION['id'];//get current username
    $Checkin = $_POST['checkin'];
    $Checkout = $_POST['checkout'];
    //$GuestID= $row['GuestID'];

    try {
      $pdo->beginTransaction();

      // QUERY 1
      //return room ID of available rooms between a certain date entered into form
      $sql = "SELECT RoomID FROM Rooms WHERE RoomID NOT IN (SELECT RoomID FROM Bookings WHERE BookingStatus ='active' AND Bookings.Checkin <= '$Checkin' AND Bookings.Checkout >= '$Checkout'  AND Bookings.RoomID=Rooms.RoomID)";

      $statement = $pdo->query($sql);

       while ($row = $statement->fetch(PDO::FETCH_ASSOC)) { //loop through rows 
            // echo $row['RoomID'] . '<br>'; //show room ids of each row
             // var_dump($row);
             $availRooms = $row['RoomID'];

            if ($row['RoomID'] != 0) {    
             echo "Room " . $availRooms . " is available for that date! " . "<br>";
        } 
          };

        // commit the transaction
      $pdo->commit();

    } catch (\PDOException $e) {
      // rollback the transaction
      $pdo->rollBack();

      // show the error message
      die($e->getMessage());
    };
    ?>
  
  <a href="user.php">Book Reservation!</a><br>
   <a href="index.php">Or, Search different dates!</a>
  
     <p>If you have any questions, do not hesitate to contact us!</p>
    <i class="fa fa-map-marker w3-text-teal" style="width:30px"></i> Nelson BC<br>
    <i class="fa fa-phone w3-text-teal" style="width:30px"></i> Phone: 250 BCK WOOD<br>
    <i class="fa fa-envelope w3-text-teal" style="width:30px"> </i> Email: info@backwoodslodge.com<br>
     
  </div>

  <?php include 'footer.php'; ?>
  
</html>