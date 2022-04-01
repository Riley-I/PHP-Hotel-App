
function getBookings(){
  
 var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById('searchResults').innerHTML
      
    }
  };
  xmlhttp.open("GET", "query.php" + true);
  xmlhttp.send();
  
}
