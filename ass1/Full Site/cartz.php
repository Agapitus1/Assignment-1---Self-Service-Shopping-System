<html>
<?php
session_start();

      $link = mysqli_connect("aa11qv1eldmot1d.cnyllfagtlgk.us-east-1.rds.amazonaws.com", "uts", "DBPASSWORD", "assignment1"); // server host, username, password, database name
        //  aax5grlzdab4wq.cldcl6stxuy9.us-east-1.rds.amazonaws.com

        
        // 2. Run a query
        $pid = $_REQUEST['product_id'];
        $query_string = "select * from  products where product_id = $pid;";

        // 3. Execute a query
        $result = mysqli_query($link, $query_string);

        // 4. Number of return rows
        $num_rows = mysqli_num_rows($result);
        // echo $num_rows; // check and see if the code above runs properly or not

        // 5. Display values
        if ($num_rows > 0 ) {
                if ( $a_row = mysqli_fetch_array($result) ) { // 4. To retrieve the rows
                // this form comes from cart to checkout
                echo "<form id='framez' action='checkout.php' target='frame3'>";
                echo "<table>";
                    echo "<tr>";
                        // Table Header
                        echo "<th>Product Name</th>";
                        echo "<th></th>";
                        echo "<th>Unit Price</th>";
                        echo "<th></th>";"<th></th>";
                        echo "<th>Unit Quantity</th>"  ;
                        echo "<th></th>";"<th></th>";
                        echo "<th> Amount</th>";

                    echo "</tr>";
                    
          
                    echo "<tr>";
                        // Values
                        echo "<td>".$a_row['product_name']."</td>";
                        echo "<th></th>";
                        echo "<td>$".$a_row['unit_price']."</td>";
                        echo "<th></th>";
                        echo "<td>".$a_row['unit_quantity']."</td>";
                        echo "<th></th>";
                        echo "<td>".$_REQUEST['pquantity']." pcs</td>";
                    echo "</tr>";
            
            
                echo "</table>";
                echo "</br>"."</br>";
                    echo "<td class='cartForm'><button type='submit' value='Purchase' id='checkout' href='checkout.php' target='frame3'>Checkout</button>";
                    echo "<td>  </td>";"<td>  </td>";"<td>  </td>";
                    echo "<td class='cartForm'><button type='reset' value='reset' name='reset' id='reset' onclick='delFrame()' >Reset</button></td>";
                echo "</form>";
                }
            }
        ?>
<script>
function delFrame() {
       var getframe = document.getElementById("framez");
       getframe.remove();
    }
    </script>
</html>