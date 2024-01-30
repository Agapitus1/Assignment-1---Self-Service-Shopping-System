
<!DOCTYPE html>
    
</header>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <link rel="stylesheet" href="../css/style.css">

    </head>
    <body>
        <main>
        <?php
        // 0. Check if product_id has been called from catalogue.php
        if (isset($_POST['p_id']) && isset($_GET['p_id'])){
            $id = $_GET['p_id'];
        }

        // check if a session has already been created, if not make new session
        if (!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }
        // $_SESSION["currentID"] = $id;

        $quantity = $_POST['quantity'];
        
        $item = [
            "id" -> $id,
            "name" -> $pname,
            "price" -> $pprice,
            "quantity" -> $quantity,
            "stock" -> $in_stock
        ];

        array_push($_SESSION['cart'], $item);

        // 1. Connect to Database
        $conn = mysqli_connect("localhost", "uts", "internet", "assignment1"); // server host, username, password, database name
        //  aax5grlzdab4wq.cldcl6stxuy9.us-east-1.rds.amazonaws.com

        
        // 2. Run a query
        $query_string = "select * from  products where product_id = $id;";

        // 3. Execute a query
        $result = mysqli_query($conn, $query_string);

        // 4. Number of return rows
        $num_rows = mysqli_num_rows($result);
        // echo $num_rows; // check and see if the code above runs properly or not

        // 5. Display values
        if ($num_rows > 0 ) {
            if ( $a_row = mysqli_fetch_array($result) ) { // 4. To retrieve the rows
            // this form comes from catalogue to product
            echo "<form action ='cart.php' name='products' method='GET' target='frame3' onSubmit='quantityNotification();'>";
           
                    echo "$row"."['id']";
                    echo "$row"."['name']";
                    echo "$row"."['unit_price']";
                    echo "$row"."['price']";
                    echo "$row"."['stock']";
                    echo "testing <input type='number' id='quantityNotification' min='1' value='1'>"; // Button 
                
                echo "<input type='submit' value='add' class='buy' name='add to cart' target='cart'>";
            echo "</form>";
            }
        }
        ?>

        </main>
        
    </body>
</html>