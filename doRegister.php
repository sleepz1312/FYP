<!DOCTYPE html>

<?php
// php file that contains the common database connection code
include "dbFunctions.php";

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$queryCheck = "SELECT username FROM user WHERE username='$username'";

$queryName = mysqli_query($link, $queryCheck);
if (mysqli_num_rows($queryName) == 1) {
    $status = false;
} else {
    $query = "INSERT INTO user (name, email, username, password) 
              VALUES (?, ?, ?, SHA1(?))";

    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $password);
    $status = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

if ($status) {
    $message = "<p>Your new account has been successfully created. 
                You are now ready to <a href='login.php'>login</a>.</p>";
} else {
    $message = "The username " . htmlspecialchars($username, ENT_QUOTES, 'UTF-8') . " already exists.";
    $message .= "</br><a href='register.php'>Try again!</a>";
}

mysqli_close($link);

?>
<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Register Osmosis Learn</title>
    <link rel="stylesheet" type="text/css" href="Solution/style.css">
</head>

<body>
    <h3>Osmosis Learn - Register</h3>
    <?php
    echo $message;
    ?>
</body>

</html>