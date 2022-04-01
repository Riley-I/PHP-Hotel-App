<?php
// Initialize the session
if ( ! session_id() ) {
  session_start();
  }
//THIS PAGE IS FOR ADMIN TO CHECKIN AND CHECKOUT GUESTS 
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
    <h1 class="my-5">Hi Again admin, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Checkin and Checkout guests here</h1>
     <div class="w3-container" id="guests">
        <h2>All Guests</h2>
       <p>1 = checked in</p>

       
      <?php
      //GET ALL INFO FOR ALL BOOKINGS 
        $sql = "SELECT GuestID, LastName, FirstName, CheckinStatus FROM Guests";
        $statement = $pdo->query($sql);

        while($row = $statement->fetch(PDO::FETCH_ASSOC)) { //loop through rows 
               echo "Guest Id" . ": " . $row['GuestID'] . " Last Name" . ": " . $row['LastName'] . " First Name" . ": " . $row['FirstName'] . " Checking Status" . ": " . $row['CheckinStatus'] . ' <br> '; 
           }
       ?>
  </div>
  
  <?php
  //SAME PAGE CHECKIN AND CHECKOUT MESSAGES
      $checkinmessage = "";
      $checkoutmessage = "";
      $GuestID = $_POST['guestid'];
  
      if(isset($_POST['SubmitButton'])){ //check if form was submitted
        $input = $_POST['guestid']; //get input text
        $checkinmessage = "Success! Guest # " .$input . " has been checked in";
      } 
  
      if(isset($_POST['SubmitButton2'])){ //check if form was submitted
        $input = $_POST['guestid']; //get input text
        $checkoutmessage = "Success! Guest # " .$input . " has been checked out";
      }    
?>
  

   <div class="w3-container" id="checkinguest">
        <h2>Checkin a Guest</h2>
    <form action="" method="POST" role="form">
      <?php echo $checkinmessage; ?>
      <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="Guest ID" name="guestid"></p>
      <p><button class="w3-button w3-black w3-padding-large" type="submit" name="SubmitButton">Check in Guest</button></p>
    </form>  
  </div>
  
     <div class="w3-container" id="checkoutguest">
        <h2>Check-out a Guest</h2>
    <form action="" method="POST" role="form">
      <?php echo $checkoutmessage; ?>
      <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="Guest ID" name="guestid"></p>
      <p><button class="w3-button w3-black w3-padding-large" type="submit" name="SubmitButton2">Check Out Guest</button></p>
    </form>
     
  </div>
  
    <?php
      //CHECK IN GUEST
      $sql = "UPDATE Guests SET CheckinStatus = 1 WHERE GuestID = :guestid;";
      $statement = $pdo->prepare($sql);
      $statement->execute([
         ':guestid' => $GuestID
          ]);
        ?>
  
      <?php
      //CHECK OUT GUEST
      $sql = "UPDATE Guests SET CheckinStatus = 0 WHERE GuestID = :guestid;";
      $statement = $pdo->prepare($sql);
      $statement->execute([
        ':guestid' => $GuestID
         ]);
      ?>
  
  <a href="index.php">
  Or, Go back home
  </a>

    <p><a href="reset-password.php" class="btn btn-warning">Reset Your Password</a><a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a></p>
  
  <?php include 'footer.php'; ?>
</body>
</html>