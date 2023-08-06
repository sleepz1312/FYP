<?php
session_start();
// php file that contains the common database connection code
include "dbFunctions.php";

$entered_username = $_POST['idusername'];
$entered_password = $_POST['idpassword'];


$msg = "";

$queryCheck = "SELECT * FROM user
          WHERE username='$entered_username'
          AND password = SHA1('$entered_password')";


$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

if (mysqli_num_rows($resultCheck) == 1) {
    $row = mysqli_fetch_array($resultCheck);
    $_SESSION['userId'] = $row['user_id'];
    $_SESSION['username'] = $row['username'];


    $msg = "<p><i>You are logged in as " . $_SESSION['username'] . "</p>";
    $msg .= "</p><a href='home.php'>Home</a><p>";


    if (isset($_POST['remember'])) {
        setcookie("username", $row['username'], time() + 3600 * 24 * 100);
    } else {
        setcookie("username", 0, time() - 3600);
    }


} else {
    $msg = "<p>Sorry, you must enter a valid username and password to log in</p>";
    $msg .= "<p><a href='login.php'>Go back to login page</a></p>";

}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="stylesheets/loginStylesheet.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <title>Login</title>
</head>

<body>
    <?php include "navBar.php" ?>
    <center>

        <?php
        echo $msg;
        ?>
    </center>
</body>

</html>