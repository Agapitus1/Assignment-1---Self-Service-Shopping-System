<!DOCTYPE html>
<html>
    
        

<?php

if (isset($_POST['product_id']) && isset($_GET['product_id'])){
            $pid = $_GET['product_id'];
        }
// check if the data is recorded from the previous submission
// !(true)=false
   

   if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        
        $quantity = $_POST['unit_quantity'];
        
        $item = [
            "product_id" -> $pid,
            "product_name" -> $pname,
            "unit_price" -> $pprice,
            "quantity" -> $quantity,
        ];
        
        array_push($_SESSION['cart'], $item);
//1: create connection
$link = mysqli_connect('aa11qv1eldmot1d.cnyllfagtlgk.us-east-1.rds.amazonaws.com', 'uts', 'DBPASSWORD', 'assignment1');

//2: create a query
$pid = $_REQUEST['product_id'];
$query_string = "select * from products where (product_id=$pid)";

//3: run the query
$result = mysqli_query($link, $query_string);

//4: thte number of rows in $result
$num_rows = mysqli_num_rows($result);
//echo $num_rows;

//5: display data
if($num_rows>=0)
{
    while($a_row=mysqli_fetch_assoc($result))
    {
    $pname=$a_row['product_name'];
    $pprice=$a_row['unit_price'];
    $quantity=$a_row['quantity'];
    echo "</br>"."</br>"."</br>";
    echo "Product: ".$a_row['product_name']."</br>";
    echo "Unit Price: $".$a_row['unit_price']."</br>";
    echo "Unit Quantity: ".$a_row['unit_quantity']."</br>"."</br>";
    }
}


?>


<form class="absolute" method="post" action="cartz.php" target="frame3">
        <label>Quantity to buy:</label><br>
        <input type="number" id="pquantity" name="pquantity" min="1" max="20" value='<?php echo $quantity; ?>'><br><br>
        <input type="hidden" id="product_id" name="product_id" value='<?php echo $pid; ?>'>
        <input type="hidden" id="product_name" name="product_name" value='<?php echo $pname; ?>'>
        <input type="hidden" id="unit_price" name="unit_price" value='<?php echo $pprice; ?>'>
        <input type="submit" value="Add to Cart">
        </form>
        
     
   
</html>

