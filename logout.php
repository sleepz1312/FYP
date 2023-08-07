<?php
session_start();
// php file that contains the common database connection code
include "dbFunctions.php";

if (isset($_SESSION['username'])) {
    session_destroy();
}



$message = "<p>You have logged out.<br /><br/>
        <a href='login.php'>Go back to login page</a></p>";
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>logout</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="stylesheets/loginStylesheet.css" rel="stylesheet" type="text/css" />
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
        <?php
        echo $message;
        ?>
    </center>
    <script type="text/javascript"> //to reload the page and let the navbar show login/register instead of logout
        // JavaScript anonymous function
        (() => {
            if (window.localStorage) {

                // If there is no item as 'reload'
                // in localstorage then create one &
                // reload the page
                if (!localStorage.getItem('reload')) {
                    localStorage['reload'] = true;
                    window.location.reload();
                } else {

                    // If there exists a 'reload' item
                    // then clear the 'reload' item in
                    // local storage
                    localStorage.removeItem('reload');
                }
            }
        })(); // Calling anonymous function here only</script>
</body>

</html>