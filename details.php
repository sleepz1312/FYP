<?php

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
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Hotel Details</title>
</head>

<body>
    <div class="row">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php">Hotels</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="review.php">Hotel Reviews</a>
                        </li>
                    </ul>
                </div>
        </nav>
        <?php if (!empty($id)) { ?>
            <div style="width:350px;">
                <img src="<?php echo $content?>" />
                <br />
                <b>File Type:</b>
                <?php echo $filetype ?><br />
                <b>Author:</b>
                <?php echo $author ?><br />
                <b>Publisher</b>
                <?php echo $publisher ?><br />
                <b>Date Published:</b>
                <?php echo $date ?><br />
                                <b>Skill Tags:</b>
                <?php echo $skilltags ?><br />
                                <b>Title:</b>
                <?php echo $title ?><br />
                                <b>Duration:</b>
                <?php echo $duration ?><br />
                                <b>Intent:</b>
                <?php echo $intent ?><br />
            </div>
        <?php } ?>
</body>

</html>