<?php
include "dbFunctions.php";

$query = "SELECT * FROM asset";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Hotel List</title>
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
                            <a class="nav-link" href="details.php">Hotel Reviews</a>
                        </li>
                    </ul>
                </div>
        </nav>
        <h1>List of hotels</h1>
        <table border="2" cellpadding="2" cellspacing="2">
            <tr>
                <th>Thumbnail</th>
                <th>Name</th>
                <th>File Type</th>
                <th>iFrame</th>
                <th>Duration</th>
                <th>Publish Date</th>
            </tr>

            <?php
            for ($i = 0; $i < count($arrContent); $i++) {
                $id = $arrContent[$i]['asset_id'];
                $filetype = $arrContent[$i]['filetype'];
                $author = $arrContent[$i]['author'];
                $intent = $arrContent[$i]['intent'];
                $picture = $arrContent[$i]['thumbnail'];
                $skilltags = $arrContent[$i]['skill_tags'];
                $publisher = $arrContent[$i]['publisher'];
                $title = $arrContent[$i]['title'];
                $content = $arrContent[$i]['content'];
                $duration = $arrContent[$i]['duration'];
                $date = $arrContent[$i]['pub_date'];
                ?>

                <tr>
                    <td><img
                            src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($picture); ?>" />
                    </td>
                    <td>
                        <?php echo $title; ?>
                    </td>
                    <td>
                        <?php echo $filetype; ?>
                    </td>
                    <td><a href="details.php?asset_id=<?php echo $id; ?>">Click Here</a></td>
                    <td>
                        <?php echo $duration; ?>
                    </td>
                    <td>
                        <?php echo $date; ?>
                    </td>
                    <td>
                        <?php echo $publisher; ?>
                    </td>
                    <td>
                        <?php echo $id; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
</body>

</html>