
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 

    </head>
    <body>
        
        <main>
            <?php
                echo"<div class ='checkout' id='validate' >";
                    echo "<form method='POST' name='checkout' action='checkout_submission.php'>";
                        echo "<h2>Contact Details:</h2>";
                        echo "<p>Please enter your user information</p>";
                        echo "<label for='fname'>First Name:</label>";
                            echo "<input type='text' id='fname' name='fname' required placeholder='Bambang'></input><br>";
                        echo "<label for='lname'>Last Name:</label>";
                            echo "<input type='text' id='lname' name='lname' placeholder='Sunarjan'></input><br>";
                        echo "<label for='address'>Address:</label>";
                            echo "<input type='text' id='address' name='address' required placeholder='11111 hehehe Street' ></input><br>";
                        echo "<label for='suburb' id='suburb'>Suburb:</label>";
                            echo "<input type='text' id='suburb' name='suburb' required placeholder='NSW'></input><br>";
                        echo "<label for='state' id='state'>State:</label>";
                            echo "<input type='text' id='state' name='state' required placeholder='Sydney'></input><br>";
                        echo "<label for='email' id='validateEmail'>Email:</label>";
                            echo "<input type='email' id='email' name='email' required placeholder='hehe@mail.com'></input><br>"; 
                        echo "<button type='submit' value='Sent!' target='checkout_submission'>Submit</button>";
                        echo "<button type='reset' name='clear'>Clear</button>";
                    echo "</form>";
                ?>
            </div>
        </main>
        <script src="valid.js"></script>
    </body>
</html>
