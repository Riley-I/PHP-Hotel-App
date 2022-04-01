<?php
if ( ! session_id() ) {
  session_start();
  }

//THIS PAGE IS FOR ADMIN TO VIEW AND MANAGE RESERVATIONS
require_once "config/connectdb.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
  
  <?php include 'admin-header.php'; ?>
<body>
    <h1 class="my-5">Welcome admin, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.</h1>
  
     <div class="w3-container" id="cancel">
        <h2>View All Current Bookings</h2>
       
      <?php
      //GET ALL INFO FOR ALL BOOKINGS 
       $UserID = $_SESSION['id'];//get current username

        $sql = "SELECT BookingID, GuestID, RoomID, Checkin, Checkout, created_at FROM Bookings WHERE BookingStatus = 'active'";
        $statement = $pdo->query($sql);

        while($row = $statement->fetch(PDO::FETCH_ASSOC)) { //loop through rows 
               echo "<li>" . "<strong>Booking ID</strong>" . ": " . $row['BookingID'] . " | " . " <strong>Guest ID</strong>" . ": " . $row['GuestID'] . " | " . " <strong>Room Number</strong>" . ": " . $row['RoomID'] . " | " . " <strong>Checkin Date</strong>" . ": " . $row['Checkin'] . " | " . " <strong>Checkout Date</strong>" . ": " . $row['Checkout'] . " | " . " <strong>Booking Made</strong> " . ": " . $row['created_at'] . ' <br> ' . ' <br> '; 
                //var_dump($row);
           }
       ?>
  </div>
  
   <div class="w3-container" id="cancel">
     <h2>Cancel A Reservation</h2>
    <form action="admin-cancel-res.php" method="POST" role="form" target="_blank">
      <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="Booking ID" name="bookingid"></p>
      <p><button class="w3-button w3-black w3-padding-large" type="submit">Cancel Reservation</button></p>
    </form> 
  </div>
  
  <a href="index.php">
  Or, Go back home
  </a>
  
    <p>
        <a href="admin-reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="admin-logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
  
  <?php include 'footer.php'; ?>
</body>
</html>