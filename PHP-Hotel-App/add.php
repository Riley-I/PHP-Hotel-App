<?php
// Initialize the session
if ( ! session_id() ) {
  session_start();
  }
//THIS PAGE IS FOR BOOKING A NEW RESERVATION

require_once "config/connectdb.php";

// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: login.php");
//     exit;
// }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
        <title>Backwoods Lodge Add Booking</title>
        <meta charset="UTF-8">
        <meta name="description" content="PHP, MySQL database hotel app">
        <meta name="keywords" content="PHP, MySQL, Database, backend web-development, hotel, booking system, web developer, portfolio, dev, portfolio, student, website">
        <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="styles/styles.css">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
             <script src="/js/script.js"></script> 
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
   
<div class="w3-container" id="bookmessage">
    
<?php
//ADD BOOKING TO TABLE

$UserID = $_SESSION['id'];//get current username
$RoomID = $_POST['room'];
$Checkin = $_POST['checkin'];
$Checkout = $_POST['checkout'];

try {
	$pdo->beginTransaction();
 
// QUERY 1
  //return room ID of available rooms between a certain date entered into form
  $sql = "SELECT RoomID FROM Rooms WHERE RoomID NOT IN (SELECT RoomID FROM Bookings WHERE Bookings.Checkin <= '$Checkin' AND Bookings.Checkout >= '$Checkout') AND RoomID = '$RoomID'";
  $statement = $pdo->query($sql);
  
   while ($row = $statement->fetch(PDO::FETCH_ASSOC)) { //loop through rows 
          echo $row['RoomID'] . '<br>'; //show room ids of each row
          var_dump($row);
          $availRooms = $row['RoomID'];
     
        if ($RoomID == $availRooms) {    //if roomid matches one of available rooms
         echo "Room " . $availRooms . " is available for that date! " . "<br>";   

               // QUERY 2
                  //query for guestID from current user id
                  $sql = "SELECT GuestID FROM Guests WHERE UserID =" . $UserID;
                  $statement = $pdo->query($sql);

                  // fetch the next row
                  while (($row = $statement->fetch(PDO::FETCH_ASSOC)) !== false) {
                      //echo $row['GuestID'] . '<br>';
                      $GuestID= $row['GuestID'];
                    
                        //QUERY 3
                            $sql = "INSERT INTO Bookings (UserID,GuestID,RoomID,Checkin,Checkout) VALUES (:user, :guest, :room, :checkin, :checkout)";
                             $statement = $pdo->prepare($sql);
                                $statement->execute([
                                  ':user' => $UserID,
                                  ':guest' => $GuestID,
                                  ':room' => $RoomID,
                                  ':checkin' => $Checkin,
                                  ':checkout' => $Checkout
                                ]);
                    echo "You have booked room " . $RoomID. " for " . $Checkin . " to " . $Checkout . "<br>";
                      };
  
//THIS ELSE STATEMENT ISN'T WORKING RIGHT - REVISIT
                  }  else {
                    echo "Sorry, that room isn't available for that date.";
                    break;
                  }
            }; //close outer while loop

          // commit the transaction
          $pdo->commit();
  
} catch (\PDOException $e) { //close try open catch
	// rollback the transaction
	$pdo->rollBack();
	// show error message
	die($e->getMessage());
};
?>
</div>
<div class="w3-container" id="returnhome">
<a href="booking-form.php">Search another date</a></div>
   
</body> 

</html>
  
<?php include 'footer.php'; ?>