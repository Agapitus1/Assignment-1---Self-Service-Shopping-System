<?php
   $name = ($_REQUEST['fname']);
   $email = ($_REQUEST['email']);
   $email_msg = "Hi, ".$name." Thank you for purchasing with us, please find your invoice attached at this email";
   
   print "Hey, ".$name."! Thank you for purchasing with us!"."</br>";
   print "We have sent your invoice at the $email you've given to us.";   
   
   mail($_REQUEST[$email] ,"email invoice", $email_msg);
   
?> 