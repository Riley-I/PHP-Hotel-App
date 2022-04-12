<?php
// Initialize the session
if ( ! session_id() ) {
  session_start();
  }

require_once "config/connectdb.php";
 
//Check if the user is logged in, if not then redirect them to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
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
  
  <div class="w3-container" id="bookingsuccess">

<?php     
  $UserID = $_SESSION['id'];//get current username
  $selectedCheckin = $_SESSION['sessionCheckin'];
  //echo $selectedCheckin . "<br>";

  $selectedCheckout = $_SESSION['sessionCheckout'];
 //echo $selectedCheckout . "<br>";

 $availRooms = $_POST['roomID'];
 //var_dump($availRooms) . "<br>";


if(isset($_POST['bookbutton1'])) {
     
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
                      ':room' => $availRooms,
                        ':checkin' => $selectedCheckin,
                        ':checkout' => $selectedCheckout
                         ]);
                         echo "Success! You have booked room " . $availRooms. " for " . $selectedCheckin . " to " . $selectedCheckout . "<br>";
                      };
}
  
  if(isset($_POST['bookbutton2'])) {
     
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
                      ':room' => $availRooms,
                        ':checkin' => $selectedCheckin,
                        ':checkout' => $selectedCheckout
                         ]);
                         echo "Success! You have booked room " . $availRooms. " for " . $selectedCheckin . " to " . $selectedCheckout . "<br>";
                      };
}
  
  if(isset($_POST['bookbutton3'])) {
     

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
                      ':room' => $availRooms,
                        ':checkin' => $selectedCheckin,
                        ':checkout' => $selectedCheckout
                         ]);
                         echo "Success! You have booked room " . $availRooms. " for " . $selectedCheckin . " to " . $selectedCheckout . "<br>";
                      };
}
  ?>
    
 
  
  </body> 

  <a href="user-res-manage.php">View my Reservations!</a><br>
   <a href="index.php">Or, Search different dates!</a>
  
     <p>If you have any questions, do not hesitate to contact us!</p>
    <i class="fa fa-map-marker w3-text-teal" style="width:30px"></i> Nelson BC<br>
    <i class="fa fa-phone w3-text-teal" style="width:30px"></i> Phone: 250 BCK WOOD<br>
    <i class="fa fa-envelope w3-text-teal" style="width:30px"> </i> Email: info@backwoodslodge.com<br>

   </div>
</html>
  
<?php include 'footer.php'; ?>