<?php
    // include code to start session here
    session_start();
    include "dbFunctions.php";

    $msg = "";
    $logout = "";
    if (isset($_SESSION['username'])){
    $logout = "<a href='logout.php'>Logout</a>";
    $msg = "Welcome ".$_SESSION['username']."!";}

    else{
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

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" type="image/png" href="resources/static/favicon.ico" />
		<title>FYP Prototype</title>
        <!--font awesome css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!--stylesheet-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans" />
		<link rel="stylesheet" href="resources/css/custom.css" />
		<style></style>
	</head>
	<body>
		<nav>
			<navbar>
				<img src="resources/static/logo.png" alt="osmosis learn image logo" style="width: 130px" />
				<div class="navbar-right">
					<div class="navbar-right-search">
						<img src="resources/static/search.png" alt="search" style="height: 18px" />
					</div>
					<div class="navbar-right-text text-brown underline">Explore</div>
					<div class="navbar-right-text">Create</div>
					<div class="navbar-right-text">Events</div>
					<div class="navbar-right-text">Log In</div>
					<div class="navbar-right-text">Sign Up</div>
				</div>
			</navbar>
			<breadcrumbs>
				<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none" style="height: 14px">
					<path d="M4.28546 11.5715V8.56736C4.28546 8.35738 4.49973 8.1431 4.714 8.1431H6.42818C6.64246 8.1431 6.85673 8.35738 6.85673 8.57165V11.5715C6.85673 11.6851 6.90188 11.7941 6.98225 11.8745C7.06261 11.9549 7.17162 12 7.28527 12H10.7136C10.8273 12 10.9363 11.9549 11.0167 11.8745C11.097 11.7941 11.1422 11.6851 11.1422 11.5715V5.57184C11.1423 5.51552 11.1313 5.45974 11.1098 5.40768C11.0883 5.35562 11.0568 5.3083 11.017 5.26843L9.85655 4.10879V1.2864C9.85655 1.17274 9.8114 1.06374 9.73103 0.983372C9.65066 0.903004 9.54166 0.857854 9.428 0.857854H8.57091C8.45725 0.857854 8.34825 0.903004 8.26788 0.983372C8.18751 1.06374 8.14236 1.17274 8.14236 1.2864V2.39461L5.8745 0.125901C5.83469 0.0859921 5.7874 0.0543288 5.73534 0.0327247C5.68327 0.0111205 5.62746 0 5.57109 0C5.51472 0 5.45891 0.0111205 5.40684 0.0327247C5.35478 0.0543288 5.30749 0.0859921 5.26768 0.125901L0.125136 5.26843C0.0853654 5.3083 0.0538432 5.35562 0.0323716 5.40768C0.0109 5.45974 -9.98936e-05 5.51552 6.83526e-07 5.57184V11.5715C6.83526e-07 11.6851 0.0451509 11.7941 0.125519 11.8745C0.205887 11.9549 0.314889 12 0.428546 12H3.85691C3.97057 12 4.07957 11.9549 4.15994 11.8745C4.2403 11.7941 4.28546 11.6851 4.28546 11.5715Z" fill="#E0E0E0" />
				</svg>
				<div class="arrow">
					<img src="resources/static/arrow.png" alt="arrow" style="width: 6px" />
				</div>

				<p class="text-brown">Explore Assets</p>
			</breadcrumbs>
			<heading>
				<box>
					<p>Explore Assets</p>
				</box>
			</heading>
		</nav>
		<content>
			<div id="carouselExampleRide" class="carousel carousel-dark slide" data-bs-ride="true">
				<div class="carousel-indicators">
					<button type="button" data-bs-target="#carouselExampleRide" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#carouselExampleRide" data-bs-slide-to="1" aria-label="Slide 2"></button>
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
					<span class="carousel-control-prev-icon" aria-hidden="true" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev"></span>
					<span class="visually-hidden">Previous</span>
				</span>
				<span class="carousel-control-next">
					<span class="carousel-control-next-icon" aria-hidden="true" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next"></span>
					<span class="visually-hidden">Next</span>
				</span>
			</div>
		</content>
		<footer>
			<strip></strip>
			<main>
				<div class="main-left-outer">
					<div class="main-left-inner">
						<p class="text-brown">About Us</p>
						<p class="text-brown">Privacy Policy</p>
					</div>
				</div>
				<img src="resources/static/white_logo.png" alt="osmosis learn text logo" style="width: 130px" />
				<div class="main-right-outer">
					<div class="main-right-inner text-white">We Love to Hear From You</div>
				</div>
			</main>
			<bottom>
				<p class="text-white">© 2023 Osmosis Learn</p>
			</bottom>
		</footer>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	</body>
</html>

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