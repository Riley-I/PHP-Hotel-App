<!DOCTYPE html>
<html lang="en">
  <head>
        <title>Backwoods Lodge Homepage</title>
        <meta charset="UTF-8">
              <meta name="description" content="PHP, MySQL database hotel app">
              <meta name="keywords" content="PHP, MySQL, Database, backend web-development, hotel, booking system, web developer, portfolio, dev, portfolio, student, website">
              <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="styles/styles.css">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
         <style>body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}</style>
    </head>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

  <body>
    
<div class="w3-container" id="guest">
  <h1>STEP 1</h1>
    <h2>Register as a Guest</h2>
    <p>(You must register as a guest before booking)</p>
  
  <h3 class="italic">Already a Guest? <a href="booking-form.php"><strong>Click Here</strong></a></h3>
 <form action="add-guest.php" method="post" role="form">   
      <p><input class="w3-input w3-padding-16 w3-border" type="test" placeholder="Last Name" required name="last"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="First Name" required name="first"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="city" required name="city"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="test" placeholder="phone" required name="phone"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="test" placeholder="email" required name="email"></p>
      <p>Birthdate<input class="w3-input w3-padding-16 w3-border" type="date" placeholder="YY MM DD" required name="birthdate"></p>
      <p><button class="w3-button w3-amber w3-padding-large" type="submit">Register</button></p>
    </form>
  
  <a href="booking-form.php">BOOK RESERVATION!</a></div>
    </div>
  
  
 <div class="w3-container" id="contact">
    <p>If you have any questions, do not hesitate to contact us!</p>
    <i class="fa fa-map-marker w3-text-teal" style="width:30px"></i> Nelson BC<br>
    <i class="fa fa-phone w3-text-teal" style="width:30px"></i> Phone: 250 BCK WOOD<br>
    <i class="fa fa-envelope w3-text-teal" style="width:30px"> </i> Email: info@backwoodslodge.com<br>
  </div>
    </body>
  
</html>
