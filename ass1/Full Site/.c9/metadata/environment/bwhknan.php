{"changed":true,"filter":false,"title":"bwhknan.php","tooltip":"/bwhknan.php","value":"<!-- ?php\n    session_start();\n?>  -->\n\n<!DOCTYPE html>\n    \n</header>\n<html>\n    <head>\n        <meta charset=\"utf-8\">\n        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"> \n        <link rel=\"stylesheet\" href=\"../css/style.css\">\n\n    </head>\n    <body>\n        <main>\n        <?php\n        // 0. Check if product_id has been called from catalogue.php\n        if (isset($_POST['p_id']) && isset($_GET['p_id'])){\n            $id = $_GET['p_id'];\n        }\n\n        // check if a session has already been created, if not make new session\n        if (!isset($_SESSION['cart'])){\n            $_SESSION['cart'] = [];\n        }\n        // $_SESSION[\"currentID\"] = $id;\n\n        $quantity = $_POST['unit_quantity'];\n        \n        $item = [\n            \"id\" -> $product_id,\n            \"name\" -> $product_name,\n            \"price\" -> $unit_price,\n            \"quantity\" -> $unit_quantity,\n            \"stock\" -> $in_stock\n        ];\n\n        array_push($_SESSION['cart'], $item);\n\n        // 1. Connect to Database\n        $conn = mysqli_connect(\"localhost\", \"uts\", \"internet\", \"assignment1\"); // server host, username, password, database name\n        //  aax5grlzdab4wq.cldcl6stxuy9.us-east-1.rds.amazonaws.com\n\n        // Check connection\n        if (!$conn) {\n        die(\"Connection failed, could not connect to the server\");\n        }\n\n        // 2. Run a query\n        $query_string = \"select * from  products where product_id = $product_id;\";\n\n        // 3. Execute a query\n        $result = mysqli_query($conn, $query_string);\n\n        // 4. Number of return rows\n        $num_rows = mysqli_num_rows($result);\n        // echo $num_rows; // check and see if the code above runs properly or not\n\n        // 5. Display values\n        if ($num_rows > 0 ) {\n            if ( $a_row = mysqli_fetch_array($result) ) { // 4. To retrieve the rows\n            // this form comes from catalogue to product\n            echo \"<form action ='cart.php' name='products' method='GET' target='bottom-right' onSubmit='quantityNotification();'>\";\n            echo \"<table>\";\n                echo \"<tr>\";\n                    // Table Header\n                    echo \"<th>Product Id</th>\";\n                    echo \"<th>Product Name</th>\";\n                    echo \"<th>Unit Price</th>\";\n                    echo \"<th>Unit Quantity</th>\";\n                    echo \"<th>In Stock</th>\";\n                echo \"</tr>\";\n                echo \"<tr>\";\n                    // Values\n                    echo \"<td>\".\"$a_row\".\"['product_id']\".\"</td>\";\n                    echo \"<td>\".\"$a_row\".\"['product_name']\".\"</td>\";\n                    echo \"<td>\".\"$a_row\".\"['unit_price']\".\"</td>\";\n                    echo \"<td>\".\"$a_row\".\"['unit_quantity']\".\"</td>\";\n                    echo \"<td>\".\"$a_row\".\"['in_stock']\".\"</td>\";\n                    echo \"<td>testing <input type='number' id='quantityNotification' min='1' value='1'></td>\"; // Button \n                echo \"</tr>\";\n            echo \"</table>\";\n                echo \"<td><input type='submit' value='add' class='buy' name='add to cart' target='cart'></td>\";\n            echo \"</form>\";\n            }\n        }\n        ?>\n\n        </main>\n        <script src=\"../js/products.js\"></script>\n    </body>\n</html>","undoManager":{"mark":0,"position":4,"stack":[[{"start":{"row":0,"column":0},"end":{"row":98,"column":7},"action":"insert","lines":["<!-- ?php","    session_start();","?>  -->","","<!DOCTYPE html>","    ","</header>","<html>","    <head>","        <meta charset=\"utf-8\">","        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"> ","        <title>Grocery System Store</title>","","        <!-- description -->","        <meta name=\"author\" content=\"Ricky Felix\">","        <meta name=\"description\" content=\"Grocery System Store\">","        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">","        <link rel=\"stylesheet\" href=\"../css/style.css\">","","    </head>","    <body>","        <main>","        <?php","        // 0. Check if product_id has been called from catalogue.php","        if (isset($_POST['product_id']) && isset($_GET['product_id'])){","            $id = $_GET['product_id'];","        }","","        // check if a session has already been created, if not make new session","        if (!isset($_SESSION['cart'])){","            $_SESSION['cart'] = [];","        }","        // $_SESSION[\"currentID\"] = $id;","","        $quantity = $_POST['unit_quantity'];","        ","        $item = [","            \"id\" -> $product_id,","            \"name\" -> $product_name,","            \"price\" -> $unit_price,","            \"quantity\" -> $unit_quantity,","            \"stock\" -> $in_stock","        ];","","        array_push($_SESSION['cart'], $item);","","        // 1. Connect to Database","        $conn = mysqli_connect(\"localhost\", \"uts\", \"internet\", \"assignment1\"); // server host, username, password, database name","        //  aax5grlzdab4wq.cldcl6stxuy9.us-east-1.rds.amazonaws.com","","        // Check connection","        if (!$conn) {","        die(\"Connection failed, could not connect to the server\");","        }","","        // 2. Run a query","        $query_string = \"select * from  products where product_id = $product_id;\";","","        // 3. Execute a query","        $result = mysqli_query($conn, $query_string);","","        // 4. Number of return rows","        $num_rows = mysqli_num_rows($result);","        // echo $num_rows; // check and see if the code above runs properly or not","","        // 5. Display values","        if ($num_rows > 0 ) {","            if ( $a_row = mysqli_fetch_array($result) ) { // 4. To retrieve the rows","            // this form comes from catalogue to product","            echo \"<form action ='cart.php' name='products' method='GET' target='bottom-right' onSubmit='quantityNotification();'>\";","            echo \"<table>\";","                echo \"<tr>\";","                    // Table Header","                    echo \"<th>Product Id</th>\";","                    echo \"<th>Product Name</th>\";","                    echo \"<th>Unit Price</th>\";","                    echo \"<th>Unit Quantity</th>\";","                    echo \"<th>In Stock</th>\";","                echo \"</tr>\";","                echo \"<tr>\";","                    // Values","                    echo \"<td>\".\"$a_row\".\"['product_id']\".\"</td>\";","                    echo \"<td>\".\"$a_row\".\"['product_name']\".\"</td>\";","                    echo \"<td>\".\"$a_row\".\"['unit_price']\".\"</td>\";","                    echo \"<td>\".\"$a_row\".\"['unit_quantity']\".\"</td>\";","                    echo \"<td>\".\"$a_row\".\"['in_stock']\".\"</td>\";","                    echo \"<td>testing <input type='number' id='quantityNotification' min='1' value='1'></td>\"; // Button ","                echo \"</tr>\";","            echo \"</table>\";","                echo \"<td><input type='submit' value='add' class='buy' name='add to cart' target='cart'></td>\";","            echo \"</form>\";","            }","        }","        ?>","","        </main>","        <script src=\"../js/products.js\"></script>","    </body>","</html>"],"id":1}],[{"start":{"row":11,"column":0},"end":{"row":16,"column":76},"action":"remove","lines":["        <title>Grocery System Store</title>","","        <!-- description -->","        <meta name=\"author\" content=\"Ricky Felix\">","        <meta name=\"description\" content=\"Grocery System Store\">","        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">"],"id":2},{"start":{"row":10,"column":62},"end":{"row":11,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":18,"column":26},"end":{"row":18,"column":36},"action":"remove","lines":["product_id"],"id":3},{"start":{"row":18,"column":26},"end":{"row":18,"column":30},"action":"insert","lines":["p_id"]}],[{"start":{"row":18,"column":50},"end":{"row":18,"column":60},"action":"remove","lines":["product_id"],"id":4},{"start":{"row":18,"column":50},"end":{"row":18,"column":54},"action":"insert","lines":["p_id"]}],[{"start":{"row":19,"column":25},"end":{"row":19,"column":35},"action":"remove","lines":["product_id"],"id":5},{"start":{"row":19,"column":25},"end":{"row":19,"column":29},"action":"insert","lines":["p_id"]}]]},"ace":{"folds":[],"scrolltop":75,"scrollleft":0,"selection":{"start":{"row":19,"column":32},"end":{"row":19,"column":32},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":4,"state":"start","mode":"ace/mode/php"}},"timestamp":1654665439130}