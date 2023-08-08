<nav class="navbar navbar-expand-md navbar-light bg-white ">
    <div id="menu" class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2 container-fluid">
        <ul class="navbar-nav mr-auto">
            <center><a class="navbar-brand mx-auto" href="home.php"><img src="media/osmosis learn logo.png" alt="Logo"
                        width="250" height="80" /></a></center>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>

            <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
            </li>
        </ul>

        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['userId'])) { ?>
                    <li> <a class="logout" href="logout.php">Logout</a></li>
                <?php } else { ?>
                    <li> <a class="login" href="login.php">Login/Register</a></li>
                <?php } ?>
                <li><a href="#explore" class="explore">Explore</a></li>
                <li> <a class="create" style="color:lightgray">Create</a></li>
                <li> <a class="events" style="color: lightgray">Events</a></li>
            </ul>
        </div>
    </div>
</nav>

<?php
if (isset($_SESSION['user_id'])) {
    echo "<i>Welcome " . $_SESSION['username'];
}
?>