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
    <!--stylesheet-->
    <link href="detailspage.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://unpkg.com/vue@2.6.14/dist/vue.js"></script>
    <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <title>Filetype</title>
</head>

<body>
    <div class="row">
        <ul class="topnav" id="myTopnav">
            <li><img src="media/osmosis learn logo.png" alt="osmosis learn logo" class="logo" width="250" height="80"></li>
            <li><a href="#explore" class="explore">Explore</a></li>
            <li><a href="#create" class="create">Create</a></li>
            <li><a href="#events" class="events">Events</a></li>
            <li><a href="#login" class="login">Log In</a></li>
            <li><a href="#signup" class="signup">Sign Up</a></li>
        </ul>
        <hr>
        <div class="navbottom" style="padding-left:50px;">
            <i class="fas fa-home" href="home.php"></i>
            <a> > </a>
            <?php echo $title; ?>
        </div>
        <hr>
        <?php if (!empty($id)) { ?>
            <div class="iframe">
                <?php if ($filetype == "LINK") { ?>
                    <!-- Vue component for LINK -->
                    <div id="app">
                        <iframe-component width="960" height="436" :src=" '<?php echo $content ?>' "></iframe-component>
                    </div>
                <?php } elseif ($filetype == "IMG") { ?>
                    <!-- Vue component for IMG -->
                    <div id="app">
                        <iframe-component width="960" height="436" :src="'media/<?php echo $content ?>'"></iframe-component>
                    </div>
                <?php } elseif ($filetype == 'MP3') { ?>
                    <!-- Vue component for MP3 -->
                    <div id="app">
                        <iframe-component width="960" height="436" :src="'media/<?php echo $content ?>'"></iframe-component>
                    </div>
                <?php } elseif ($filetype == "MP4") { ?>
                    <!-- Vue component for MP4 -->
                    <div id="app">
                        <iframe-component width="960" height="436" :src="'media/<?php echo $content ?>'"></iframe-component>
                    </div>
                <?php } elseif ($filetype == "pdf") { ?>
                    <!-- Vue component for PDF -->
                    <div id="app">
                        <iframe-component width="960" height="436" :src="'media/<?php echo $content ?>'"></iframe-component>
                    </div>
                <?php } else { ?>
                    <!-- Vue component for default (fallback) -->
                    <div id="app">
                        <iframe-component width="960" height="436" :src="'<?php echo $content ?>'"></iframe-component>
                    </div>
                <?php } ?>
            </div>

            <script>
                // Define the Vue iframe component
                Vue.component('iframe-component', {
                    props: ['src'],
                    template: '<iframe :src="src"></iframe>'
                });

                // Initialize the Vue app
                new Vue({
                    el: '#app',
                });
            </script>
            <div style="font-weight:lighter;">
                <div class="toprow">
                    <b class="uploaded-by" style="padding-left:60px;">Uploaded By</b>
                    <b class="authored-by" style="padding-left:40px;">Authored By</b>
                    <b class="time">
                        <?php echo $filetype ?>.
                        <?php echo $duration ?> .Published
                        <?php echo $date ?>
                    </b>
                </div>
                <div class="secondrow" style="color:gray;padding-bottom:10px;">
                    <b class="publisher" style="padding-left:60px;">
                        <?php echo $publisher ?>
                    </b>
                    <b class="author" style="padding-left:180px;">
                        <?php echo $author ?>
                    </b>
                </div>
                <hr>
                <div class="information">
                    <b class="intent" style="font-size:30px; padding-top:20px; padding-left: 60px;">Intent of this Asset</b>
                    </br>
                    <b class="container" style="padding-left:60px;padding-bottom:100px">
                        <?php echo $intent ?>
                    </b>
                </div>
            </div>
        </div>
    <?php } ?>
    <footer class="navbar navbar-expand-sm" style="background-color: #3a2718;">
        <div class="container-fluid">
            <ul class="nav text-muted" style="background-color: #3a2718;">
                <li class="nav-item">
                    <a class="pl-2 pr-2 btn btn-footer" style="color: #fff;" href="about-us">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="pl-2 pr-2 btn btn-footer" style="color: #fff;" href="#private-policy">Privacy Policy</a>
                </li>
            </ul>
            <button class="button button1" style="background-color:#3a2718;">
                <a class="pl-2 pr-2 btn btn-footer" style="color: #fff;" href="#feedback">We Love to Hear From You</a>
            </button>
        </div>
    </footer>

    <div class="footer footer-btm" style="background-color: #503620; color: white;">
        <div class="footer container justify-content-end text-end">
            © 2023 Osmosis Learn
        </div>
    </div>
</body>

</html>


$id=htmlspecialchars(_GET['asset_id']);
$id=urlencode($_GET['asset_id'])