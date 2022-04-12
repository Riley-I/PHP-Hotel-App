<?php
//THIS PAGE IS FOR USERS VIEWING RESERVATIONS
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
<html>
  <head>
        <title>Backwoods Lodge User Reservations</title>
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
<body>
  
  
   <div class="w3-container" id="viewres">
      <h2>My Reservations</h2>

     <?php include 'user-view-res.php'; ?>
  </div>

  </body>
  
  <?php include 'footer.php'; ?>
</html>