<html>
<?php
session_start();
// isset method to check if the variable exists 
// check if the user submitted some data in the textbox
if (isset ($_POST['quantity'])) {
// check if the data is recorded from the previous submission
// !(true)=false
   

   if (!isset($_SESSION['cart'])) {
      
      echo "CART"."<br>"."<br>";
      echo "Product: ".$_POST['p_name']."<br>";
      echo "Price: ".$_POST['p_price']."<br>";
      echo "Quantity: ".$_POST['quantity']."<br>"."<br>";
      echo "Total Price: ".$_POST['p_price']*$_POST['quantity']."<br>"."<br>";
      // write a code here to initialize the session counter
      $_SESSION['times'] = 0;
   } else {
      // write a code here to increment the counters
      do {
      echo "CART"."<br>";
      echo "Product: ".$_POST['p_name']."<br>";
      echo "Price: ".$_POST['p_price']."<br>";
      echo "Quantity: ".$_POST['quantity']."<br>";
      echo "Total Price: ".$_POST['p_price']*$_POST['quantity']."<br>";
      break;
        } while ($_SESSION['times'] <= 30);

   }

   // write a code below to assign the new values submitted from formdata to the session data 
   $_SESSION['cart'] = $_POST['quantity'];
   
   
   
   // display the current data
   //echo "current data = ".$_SESSION['cart']."<br>";
} else {
   echo "No data was submitted<br>";
}
session_destroy();
?>

<form >
   <input type="Submit" value="Check Out">
  <input type="button" name="resetIFrame" value="Reset" 
       class="button" onclick="reset(frame3);"/>
  
</form>


</html>