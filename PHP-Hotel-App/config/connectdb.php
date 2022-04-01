<?php
require 'config.php'; // will stop execution of script when error occurs

try {//execute this code, if it cant
  
      //tell PDO what type of database connecting to
    //dsn = data source name variable
    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

    $pdo = new PDO($dsn, $user, $pass);
    // new object from the PDO class
  
  if($pdo) {
 // echo "connected successfully" . "<br>";
}
  
} 
catch(PDOException $e) {//execute this code if other code fails
  echo $e->getMessage();
  // arrow operator -> & =>
  
}

?>
