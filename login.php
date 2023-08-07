<?php
$rememberUsername = "";

//check if cookie is set, then set $rememberUsername to cookie
if (isset($_COOKIE['username'])) {
    $rememberUsername = $_COOKIE['username'];
}

if (isset($_POST['remember'])) {
    setcookie("username", htmlspecialchars($_POST['idusername'], ENT_QUOTES, 'UTF-8'), time() + 3600 * 24 * 100);
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
                                value="<?php echo htmlspecialchars($rememberUsername, ENT_QUOTES, 'UTF-8'); ?>" /></td>
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