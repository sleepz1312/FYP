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