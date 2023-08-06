<?php
include "dbFunctions.php";

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
    <title>FYP prototype</title>
    <style>
    .carousel-inner .carousel-item .col-md-4 {
        flex: 0 0 33.333333%;
        max-width: 33.333333%;
    }

    .carousel-inner .carousel-item .card {
        border: none;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 500px;
    }

    .carousel-inner .carousel-item .card-img-top {
        width: 100%;
        height: 200px;
        object-fit: cover;
        flex-grow: 1;
    }

    .carousel-inner .carousel-item .card-title {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .carousel-inner .carousel-item .card-text {
        font-size: 1rem;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 100px;
        height: 100px;
    }
    </style>
</head>

<body>
    <div class="row">
        <ul class="topnav" id="myTopnav">
            <li><img src="media/osmosis learn logo.png" alt="osmosis learn logo" class="logo" width="250" height="80">
            </li>
            <li><a href="#explore" class="explore">Explore</a></li>
            <li><a href="#create" class="create">Create</a></li>
            <li><a href="#events" class="events">Events</a></li>
            <li><a href="#login" class="login">Log In</a></li>
            <li><a href="#signup" class="signup">Sign Up</a></li>
        </ul>
        <hr>
        <h1>Explore Assets</h1>
        <hr>
        <!-- Carousel Structure -->
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
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
                            <div class="card">
                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($picture); ?>"
                                    class="card-img-top" alt="<?php echo $title; ?>" />
                                <div class="card-body">
                                    <h5 class="card-title"><a
                                            href="details.php?asset_id=<?php echo $id; ?>" style="text-decoration:none;color:black;"><?php echo $title; ?></a>
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
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true" style="color:black;"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
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
