<?php
// Initialize the session
if ( ! session_id() ) {
  session_start();
  }
  
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
  
      <script>
      if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
      }
  </script>
  
  <?php include 'header.php'; ?>
<body>
   <div class="w3-container w3-margin-top" id="welcomeuser">
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Register As A Guest Below... then you will be able to book!</h1>
  </div>
  
<?php include 'guest-registration-form.php'; ?>

    <p id=reset>
        <a href="admin-reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="admin-logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
  
  <?php include 'footer.php'; ?>
</body>
</html>
