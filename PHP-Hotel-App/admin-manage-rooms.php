<?php
// Initialize the session
// Initialize the session
if ( ! session_id() ) {
  session_start();
  }
//THIS PAGE IS FOR ADMIN TO VIEW AND ADD ROOMS
require_once "config/connectdb.php";
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: admin-login.php");
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
  
  
  <?php include 'admin-header.php'; ?>
<body>
    <h1 class="my-5">Hi Again admin, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. View and Add Rooms Here.</h1>
  
     <div class="w3-container" id="guests">
        <h2>All Rooms</h2>

      <?php
      //print ALL INFO FOR ALL ROOMS 
        $sql = "SELECT RoomID, RoomType, Pets, Wheelchair FROM Rooms;";
        $statement = $pdo->query($sql);

        while($row = $statement->fetch(PDO::FETCH_ASSOC)) { //loop through rows 
               echo "Room ID" . ": " . $row['RoomID'] . " Room Type" . ": " . $row['RoomType'] . " Pets" . ": " . $row['Pets'] . " Wheelchair" . ": " . $row['Wheelchair'] . ' <br> '; 
                //var_dump($row);
           }
       ?>
    </div>
 
  
   <div class="w3-container" id="addroom">
        <h2>Add a Room</h2>
    <form action="" method="POST" role="form">
      <?php echo $addRoomMessage; ?>
      
      <p>basic or family</p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Room Type" name="roomtype"></p>
       <p>1 = yes, 0 = no</p>
       <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="Pets" name="pets"></p>
       <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="Wheelchair Accessible" name="wheelchair"></p>
      <p><button class="w3-button w3-black w3-padding-large" type="submit" name="SubmitButton">Add a Room</button></p>
    </form> 
  </div>
  
   <?php
      $addRoomMessage = "";
      //$RoomID = $_POST['roomid'];
      $RoomType = $_POST['roomtype'];
      $Pets = $_POST['pets'];
      $Wheelchair = $_POST['wheelchair'];
      
  //ADD ROOM
  if (!empty($RoomType)){
      $sql = "INSERT INTO Rooms (RoomType, Pets, Wheelchair) VALUES (:roomtype, :pets, :wheelchair)";
      $statement = $pdo->prepare($sql);
      $statement->execute([
                ':roomtype' => $RoomType,
                ':pets' => $Pets,
                ':wheelchair' => $Wheelchair
             ]);
    
          //SAME PAGE ROOM ADDED MESSAGE
      if(isset($_POST['SubmitButton'])){ //check if form was submitted
        $input = $_POST['roomtype']; //get input text
        $addRoomMessage = "Success! A " .$input . " room has been added";
      } 

  } else {
      echo "Please enter room info.";
};
  ?>

  <a href="index.php">
  Or, Go back home
  </a>

    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
  
  <?php include 'footer.php'; ?>
</body>
</html>