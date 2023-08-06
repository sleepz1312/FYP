<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
// php file that contains the common database connection code
include "dbFunctions.php";

$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$queryCheck = "SELECT username FROM user
         WHERE username='$username'";

$queryName = mysqli_query($link,$queryCheck);
if (mysqli_num_rows($queryName)==1){
    $status = FALSE;
    
}
else{
    
$query = "INSERT INTO user
          (name,email,username,password) 
          VALUES 
          ('$name','$email',
           '$username',SHA1('$password'))";
 
$status = mysqli_query($link, $query);
}
if ($status) {
    $message = "<p>Your new account has been successfully created. 
                You are now ready to <a href='login.php'>login</a>.</p>";
}
else {
    $message = "the username " .$username. " already exists.";
    $message .="</br><a href='register.php'>Try again!</a>";
}


mysqli_close($link);



?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <title>Get Together - Where the neighborhood comes together!</title>
        <link rel="stylesheet" type="text/css" href="Solution/style.css">
    </head>
    <body>
        <h3>Get Together - Register</h3>
        <?php
        echo $message;
        ?>
    </body>
</html>