<?php
// include code to start session here
session_start();
include "dbFunctions.php";

$msg = "";
$logout = "";
if (isset($_SESSION['username'])) {
    $logout = "<a href='logout.php'>Logout</a>";
    // Sanitize session data before echoing
    $msg = "Welcome " . htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') . "!";
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

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--font awesome css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!--stylesheet-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <title>FYP prototype</title>
    <style>
        content {
            display: flex;
            padding: 0px 180px;
            justify-content: center;
            align-items: flex-start;
            align-content: center;
            gap: 25px;
            flex: 1 0 0;
            align-self: stretch;
            flex-wrap: wrap;
        }

        group {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            align-content: flex-start;
            gap: 15px;
            flex: 1 0 0;
            align-self: stretch;
            width: 100%;
        }

        .carousel {
            width: 100%;
        }

        .carousel-indicators {
            bottom: -50px;
        }

        .carousel-control-next {
            right: -150px;
            pointer-events: none;
        }

        .carousel-control-prev {
            left: -150px;
            pointer-events: none;
        }

        .carousel-control-prev-icon {
            pointer-events: all;
        }

        .carousel-control-next-icon {
            pointer-events: all;
        }

        .card {
            flex: 1 0 0;
        }

        .col-md-4 {
            display: flex;
            align-items: stretch;
        }

        .card-img-top {
            height: 335px;
            object-fit: contain;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .col {
            text-align: center;
        }

        .card-title {
            margin-bottom: -10px;
            padding: 0;
        }

        .container-fluid {
            padding: 0;
        }
    </style>
</head>

<body>
    <?php include "navBar.php" ?>

    <p align="middle">
        <?php echo $msg ?>!
    </p>
    <hr>
    <h1 style="padding-left: 10px;color:#8c8581;">Explore Assets</h1>
    <hr>
    <!-- Carousel Structure -->
    <content>
        <div id="carouselExampleRide" class="carousel carousel-dark slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleRide" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleRide" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-inner">
                    <?php
                    $totalSlides = count($arrContent);
                    for ($i = 0; $i < $totalSlides; $i += 3) {
                        ?>
                        <div class="carousel-item <?php echo ($i === 0) ? 'active' : ''; ?>">
                            <div class="row">
                                <?php
                                for ($j = $i; $j < $i + 3 && $j < $totalSlides; $j++) {
                                    $id = $arrContent[$j]['asset_id'];
                                    $filetype = $arrContent[$j]['filetype'];
                                    $author = $arrContent[$j]['author'];
                                    $intent = $arrContent[$j]['intent'];
                                    $picture = $arrContent[$j]['thumbnail'];
                                    $skilltags = $arrContent[$j]['skill_tags'];
                                    $publisher = $arrContent[$j]['publisher'];
                                    $title = $arrContent[$j]['title'];
                                    $content = $arrContent[$j]['content'];
                                    $duration = $arrContent[$j]['duration'];
                                    $date = $arrContent[$j]['pub_date'];
                                    ?>
                                    <div class="col-md-4">
                                        <a href="details.php?asset_id=<?php echo $id; ?>">
                                            <div class="card">
                                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($picture); ?>"
                                                    class="card-img-top" alt="<?php echo $title; ?>" />
                                                <div class="card-body">
                                                    <h5 class="card-title text-truncate"><a
                                                            href="details.php?asset_id=<?php echo $id; ?>"
                                                            style="text-decoration:none;color:black;"><?php echo $title; ?></a>
                                                    </h5>
                                                    <div class="container-fluid" id="info">
                                                        <?php echo $filetype; ?> &bull;
                                                        <?php echo $duration; ?> &bull;
                                                        <?php echo $date; ?>
                                                    </div>
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col">
                                                                <i class="fas fa-user-circle" id="author"
                                                                    data-tippy-placement="bottom"></i>
                                                            </div>
                                                            <div class="col">
                                                                <i class="fas fa-info-circle" id="intent"
                                                                    data-tippy-placement="bottom"></i>
                                                            </div>
                                                            <div class="col">
                                                                <i class="fas fa-tags fa-rotate-90" id="skilltags"
                                                                    data-tippy-placement="bottom"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <span class="carousel-control-prev">
                <span class="carousel-control-prev-icon" aria-hidden="true" type="button"
                    data-bs-target="#carouselExampleRide" data-bs-slide="prev"></span>
                <span class="visually-hidden">Previous</span>
            </span>
            <span class="carousel-control-next">
                <span class="carousel-control-next-icon" aria-hidden="true" type="button"
                    data-bs-target="#carouselExampleRide" data-bs-slide="next"></span>
                <span class="visually-hidden">Next</span>
            </span>
        </div>
    </content>
    <div class="footer" style="position:fixed;left: 0;bottom: 0;width: 100%;">
        <footer class="navbar navbar-expand-sm" style="background-color: #3a2718;">
            <div class="container-fluid">
                <ul class="nav text-muted" style="background-color: #3a2718;">
                    <li class="nav-item">
                        <a class="pl-2 pr-2 btn btn-footer" style="color: #fff;" href="about-us">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="pl-2 pr-2 btn btn-footer" style="color: #fff;" href="#private-policy">Privacy
                            Policy</a>
                    </li>
                </ul>
                <button class="button button1" style="background-color:#3a2718;">
                    <a class="pl-2 pr-2 btn btn-footer" style="color: #fff;" href="#feedback">We Love to Hear From
                        You</a>
                </button>
            </div>


        </footer>

        <div class="footer footer-btm" style="background-color: #503620; color: white;">
            <div class="footer container justify-content-end text-end">
                © 2023 Osmosis Learn
            </div>
        </div>
    </div>

</body>

<script src="https://unpkg.com/popper.js@1"></script>
<script src="https://unpkg.com/tippy.js@5"></script>
<script src="script.js"></script>

<script>
    tippy('#author', {
        content: "Author"
    });
    tippy('#intent', {
        content: "Intent of this asset"
    });
    tippy('#skilltags', {
        content: "Skill Tags"
    });
</script>

</html>