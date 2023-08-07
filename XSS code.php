<?php
// Include the database connection file
include "dbFunctions.php";

// Validate and sanitize the input
$id = filter_input(INPUT_GET, 'asset_id', FILTER_VALIDATE_INT);
if (!$id) {
    // Invalid input, handle the error (redirect or show an error message)
    die("Invalid asset ID");
}

// Prepare the SQL query using prepared statements
$query = "SELECT * FROM asset WHERE asset_id=?";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Fetch the data
$row = mysqli_fetch_array($result);
if (!$row) {
    // Asset not found, handle the error (redirect or show an error message)
    die("Asset not found");
}

// Sanitize the data before use
$filetype = htmlspecialchars($row['filetype']);
$author = htmlspecialchars($row['author']);
$intent = htmlspecialchars($row['intent']);
$picture = htmlspecialchars($row['thumbnail']);
$skilltags = htmlspecialchars($row['skill_tags']);
$publisher = htmlspecialchars($row['publisher']);
$title = htmlspecialchars($row['title']);
$content = htmlspecialchars($row['content']);
$duration = htmlspecialchars($row['duration']);
$date = htmlspecialchars($row['pub_date']);
?>

<!-- The rest of your HTML code remains unchanged -->
<!-- ... -->


<?php

include "dbFunctions.php";

$id = isset($_GET['asset_id']) ? htmlspecialchars($_GET['asset_id'], ENT_QUOTES, 'UTF-8') : null;
$query = "SELECT * FROM asset WHERE asset_id='$id'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);
if (!empty($row)) {
    $filetype = htmlspecialchars($row['filetype'], ENT_QUOTES, 'UTF-8');
    $author = htmlspecialchars($row['author'], ENT_QUOTES, 'UTF-8');
    $intent = htmlspecialchars($row['intent'], ENT_QUOTES, 'UTF-8');
    $picture = htmlspecialchars($row['thumbnail'], ENT_QUOTES, 'UTF-8');
    $skilltags = htmlspecialchars($row['skill_tags'], ENT_QUOTES, 'UTF-8');
    $publisher = htmlspecialchars($row['publisher'], ENT_QUOTES, 'UTF-8');
    $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
    $content = htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8');
    $duration = htmlspecialchars($row['duration'], ENT_QUOTES, 'UTF-8');
    $date = htmlspecialchars($row['pub_date'], ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<!-- Rest of the code remains unchanged -->

$id=htmlspecialchars(_GET['asset_id']);
$id=urlencode($_GET['asset_id'])

<!-- <?php

include "dbFunctions.php";

$id = $_GET['asset_id'];
$query = "SELECT * FROM asset WHERE asset_id='$id'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);
if (!empty($row)) {
    $filetype = $row['filetype'];
    $author = $row['author'];
    $intent = $row['intent'];
    $picture = $row['thumbnail'];
    $skilltags = $row['skill_tags'];
    $publisher = $row['publisher'];
    $title = $row['title'];
    $content = $row['content'];
    $duration = $row['duration'];
    $date = $row['pub_date'];
}
?> -->

<?php
// include code to start session here
session_start();
include "dbFunctions.php";

$msg = "";
$logout = "";
if (isset($_SESSION['username'])) {
    $logout = "<a href='logout.php'>Logout</a>";
    $msg = "Welcome " . $_SESSION['username'] . "!";
} else {
    $msg = "Currently not logged in";
    $logout = "<a href='login.php'>Login</a>";
}

$query = "SELECT * FROM asset";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

// Fetch all data and store it in an array
$arrContent = array();
while ($row = mysqli_fetch_array($result)) {
    $arrContent[] = $row;
}
?>

<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="stylesheets/registerStylesheet.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<?php include "navBar.php" ?>

    <center>
        <h1>Register</h1>
    </center>
    <center>
        <form name="form" method="post" action="doRegister.php">
            <fieldset>
                <legend style="color: black">Register Here</legend>
                <table>
                    <tr>
                        <td><label for="id_username">Username:</label></td>
                        <td><input id="id_username" type="text" name="username" /></td>
                    </tr>
                    <tr>
                    </tr>
                    <td><label for="id_password">Password:</label></td>
                    <td><input id="id_password" type="password" name="password" /></td>
                    </tr>
                    <tr>
                        <td><label for="id_name">Name:</label></td>
                        <td><input id="id_name" type="text" name="name" /></td>
                    </tr>
                    <tr>
                        <td><label for="id_address">Address:</label></td>
                        <td><input id="id_address" type="text" name="address" /></td>
                    </tr>
                    <tr>
                        <td><label for="id_email">Email:</label></td>
                        <td><input id="id_email" type="email" name="email" /></td>
                    </tr>

                </table>
                <br><br><br>


                <button id="login" type="submit" /><span>Register</span></button>
                <button id="clear" type="reset" /><span>Clear</span></button>
            </fieldset>
        </form>
    </center>

    <center>
        Already have an account? <a href="login.php">Login here</a>
    </center>
</body>

</html>

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

$queryName = mysqli_query($link, $queryCheck);
if (mysqli_num_rows($queryName) == 1) {
    $status = FALSE;

} else {

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
} else {
    $message = "the username " . $username . " already exists.";
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

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$rememberUsername = "";

//check if cookie is set, then set $rememberUsername to cookie

?>
<?php
$rememberUsername = "";
if (isset($_COOKIE['username'])) {
    $rememberUsername = $_COOKIE['username'];

}
if (isset($_POST['remember'])) {
    setcookie("username", $row['username'], time() + 3600 * 24 * 100);
} else {
    setcookie("username", 0, time() - 3600);
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
    <title>Login Page</title>
</head>

<body>
    <?php include "navBar.php" ?>
    <center>
        <h1>Login</h1>

        <form method="post" action="doLogin.php">
            <fieldset>
                <table>
                    <tr>
                        <td><label for="idUsername">Username:</label></td>
                        <td><input type="text" id="idUsername" name="idusername"
                                value="<?php echo $rememberUsername; ?>" /></td>
                    </tr>
                    <tr>

                        <td><label for="idPassword">Password:</label></td>
                        <td><input type="password" id="idPassword" name="idpassword" /></td>
                    </tr>

                    <tr>
                        <td colspan="2" align="left"><input type="checkbox" name="remember">Remember Me</td>
                    </tr>

                </table>

                <button id="login" type="submit" /><span>Login</span></button>
            </fieldset>
        </form>
        <br /><br />
        Don't have an account? <a href="register.php">Register here</a>
    </center>
</body>

</html>
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


<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="stylesheets/registerStylesheet.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body>
    <?php include "navBar.php" ?>

    <center>
        <h1>Register</h1>
    </center>
    <center>
        <form name="form" method="post" action="doRegister.php">
            <fieldset>
                <legend style="color: black">Register Here</legend>
                <table>
                    <tr>
                        <td><label for="id_username">Username:</label></td>
                        <td><input id="id_username" type="text" name="username"
                                value="<?php echo htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td><label for="id_password">Password:</label></td>
                        <td><input id="id_password" type="password" name="password" /></td>
                    </tr>
                    <tr>
                        <td><label for="id_name">Name:</label></td>
                        <td><input id="id_name" type="text" name="name"
                                value="<?php echo htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td><label for="id_email">Email:</label></td>
                        <td><input id="id_email" type="email" name="email"
                                value="<?php echo htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" />
                        </td>
                    </tr>
                </table>
                <br><br><br>
                <button id="login" type="submit"><span>Register</span></button>
                <button id="clear" type="reset"><span>Clear</span></button>
            </fieldset>
        </form>
    </center>

    <center>
        Already have an account? <a href="login.php">Login here</a>
    </center>
</body>

</html>