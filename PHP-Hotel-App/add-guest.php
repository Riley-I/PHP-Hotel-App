<?php
// Initialize the session
if ( ! session_id() ) {
  session_start();
  }

//THIS PAGE IS FOR REGISTERING A GUEST
require_once "config/connectdb.php";

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
  <body>
  <?php include 'header.php'; ?>
   

<?php

//CURRENT USER ID
$UserID = $_SESSION['id']; 
$LastName = $_POST['last'];
$FirstName= $_POST['first'];
$City = $_POST['city'];
$Phone = $_POST['phone'];
$Email = $_POST['email'];
$BirthDate = $_POST['birthdate'];

//search guest entries with the current user id
$sql = "SELECT UserID FROM Guests WHERE UserID =" . $UserID; 
    //$sql = "SELECT UserID FROM Guests INNER JOIN Guests ON users.id = Guests.GuestID WHERE users.id =" . $UserID; 
$statement = $pdo->query($sql);
    
    $sql = "INSERT INTO Guests (UserID,LastName,FirstName,City,PhoneNumber,Email,BirthDate) VALUES (:user, :lastname, :firstname, :city, :phone, :email, :birthday)";
    $statement = $pdo->prepare($sql);
    $statement->execute([
      ':user' => $UserID,
      ':lastname' => $LastName,
      ':firstname' => $FirstName,
      ':city' => $City,
      ':phone' => $Phone,
      ':email' => $Email,
      ':birthday' => $BirthDate
    ]);
    echo "You are now registered - go ahead and book!"; 

?>
    
 <div class="w3-container w3-margin-top" id="welcomeuser">
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. You can Book a Reservation!</h1>
  </div>
    
    <div class="w3-container w3-margin-top" id="book">
       <a href="booking-form.php">BOOK RESERVATION!</a>                         
     </div>

     <p id=reset>
        <a href="admin-reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="admin-logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
  
  
    <?php include 'footer.php'; ?>
</body>
</html>