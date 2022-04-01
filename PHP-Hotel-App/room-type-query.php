<?php
//SEARCHING AVAILABLE ROOMS FOR SPECIFIC DATES FOR BASIC ROOM
// Initialize the session
if ( ! session_id() ) {
  session_start();
  }

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

  
  <?php include 'header.php'; ?>
  
  
<div class="w3-container" id="bookings">
  
    <?php
    //SEARCH AVAILABLE ROOMS FOR DATES ENTERED

    $UserID = $_SESSION['id'];//get current username
    $availRooms = "";
    $Checkin = $_POST['checkin'];
    $Checkout = $_POST['checkout'];
  //echo $Checkout;
    echo "You searched for rooms for " . $Checkin . " to " . $Checkout . "<br>";



if ($Checkin != 0 && $Checkout != 0){ //IF DATES HAVE BEEN ENTERED

      if($_REQUEST['btn_submit']=="Button 1") //submit form with button 1
      {

             try {
            $pdo->beginTransaction();

            // QUERY 1
            //return room ID of available rooms between a certain date entered into form
            $sql = "SELECT RoomID FROM Rooms WHERE RoomID NOT IN (SELECT RoomID FROM Bookings WHERE Bookings.Checkin <= '$Checkin' AND Bookings.Checkout >= '$Checkout'  AND Bookings.RoomID=Rooms.RoomID) AND RoomType = 'basic'";

            $statement = $pdo->query($sql);

             while ($row = $statement->fetch(PDO::FETCH_ASSOC)) { //loop through rows 
                  // echo $row['RoomID'] . '<br>'; //show room ids of each row
                   //var_dump($row);
                   $availRooms = $row['RoomID'];
               //echo $availRooms;

                  if ($row['RoomID'] != 0) {   
                   // var_dump($availRooms);
                   echo "Room " . $availRooms . " is a Basic room and is available for " . $Checkin . " to " . $Checkout . "<form action='room-type-book.php' method='post'><input type='hidden' value='$availRooms' name='roomID'><input type='submit' name='bookbutton1' value='book' /></form>" . "<br>";
                    
                    //declare session variables to carry on to next page - book room
                    $selectedCheckin = $Checkin;
                    $_SESSION['sessionCheckin'] = $selectedCheckin;
                    
                    $selectedCheckout = $Checkout;
                    $_SESSION['sessionCheckout'] = $selectedCheckout;
                    
                    $_SESSION['availRoom'] = $availRooms;
                   // echo $availRooms;
                   // var_dump($availRooms);
       
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
 
      }

      else if($_REQUEST['btn_submit']=="Button 2")//submit form with button 2

      {
             try {
            $pdo->beginTransaction();

            // QUERY 1
            //return room ID of available rooms between a certain date entered into form
            $sql = "SELECT RoomID FROM Rooms WHERE RoomID NOT IN (SELECT RoomID FROM Bookings WHERE Bookings.Checkin <= '$Checkin' AND Bookings.Checkout >= '$Checkout'  AND Bookings.RoomID=Rooms.RoomID) AND RoomType = 'family'";

            $statement = $pdo->query($sql);

             while ($row = $statement->fetch(PDO::FETCH_ASSOC)) { //loop through rows 
                  // echo $row['RoomID'] . '<br>'; //show room ids of each row
                   // var_dump($row);
                   $availRooms = $row['RoomID'];
                   $Checkin = $_POST['checkin'];
                   $Checkout = $_POST['checkout'];

                  if ($row['RoomID'] != 0) {    
                   echo "Room " . $availRooms . " is a Family room and is available for those dates!" . "<form action='room-type-book.php' method='post'><input type='hidden' value='$availRooms' name='roomID'><input type='submit' name='bookbutton2' value='book' /></form>" . "<br>";
         
                       //declare session variables to carry on to next page - book room
                    $selectedCheckin = $Checkin;
                    $_SESSION['sessionCheckin'] = $selectedCheckin;
                    
                    $selectedCheckout = $Checkout;
                    $_SESSION['sessionCheckout'] = $selectedCheckout;
                    
                    $_SESSION['availRoom'] = $availRooms;
                   // echo $availRooms;
                   // var_dump($availRooms);
                    
  
              } else {
                    echo "Sorry no rooms are available with that criteria" . "<br>";
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

      }

         else if($_REQUEST['btn_submit']=="Button 3")//submit form with button 3
      {

            try {
            $pdo->beginTransaction();

            // QUERY 1
            //return room ID of available rooms between a certain date entered into form
            $sql = "SELECT RoomID FROM Rooms WHERE RoomID NOT IN (SELECT RoomID FROM Bookings WHERE Bookings.Checkin <= '$Checkin' AND Bookings.Checkout >= '$Checkout'  AND Bookings.RoomID=Rooms.RoomID) AND Wheelchair = 1";

            $statement = $pdo->query($sql);

             while ($row = $statement->fetch(PDO::FETCH_ASSOC)) { //loop through rows 
                  // echo $row['RoomID'] . '<br>'; //show room ids of each row
                   // var_dump($row);
                   $availRooms = $row['RoomID'];
                   $Checkin = $_POST['checkin'];
                   $Checkout = $_POST['checkout'];

                  if ($row['RoomID'] != 0) {    
                   echo "Room " . $availRooms . " is wheelchair accessible and is available for those dates!" . "<form action='room-type-book.php' method='post'><input type='hidden' value='$availRooms' name='roomID'><input type='submit' name='bookbutton3' value='book' /></form>" . "<br>";
                 
                    
                    //declare session variables to carry on to next page - book room
                    $selectedCheckin = $Checkin;
                    $_SESSION['sessionCheckin'] = $selectedCheckin;
                    
                    $selectedCheckout = $Checkout;
                    $_SESSION['sessionCheckout'] = $selectedCheckout;
                    
                    $_SESSION['availRoom'] = $availRooms;
                   // echo $availRooms;
                   // var_dump($availRooms);
                  
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
      }
  
      }else{
    echo "Oops, you forgot to enter in some dates!" . "<br>";
    
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