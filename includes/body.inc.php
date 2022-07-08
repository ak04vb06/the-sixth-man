<?php
    include("admin/includes/config.inc.php");
    $con=mysqli_connect(HOST,USER,PWD,DATABASE);
    function drawTop($menu=HOME){
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Nóticias</title>
    <link rel = "icon" type = "image/svg" href = "images/nba_75_anniv_ball.svg">

    <!-- Css Files -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/flaticon.css" rel="stylesheet">
    <link href="css/slick-slider.css" rel="stylesheet">
    <link href="css/fancybox.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="css/color.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!--// Main Wrapper \\-->
<div class="sportsmagazine-main-wrapper">

    <!--// Header \\-->
    <header id="sportsmagazine-header" class="sportsmagazine-header-one">

        <!--// TopStrip \\-->
        <div class="sportsmagazine-topstrip">
            <div class="container">

            </div>
        </div>
        <!--// TopStrip \\-->

        <!--// MainSection \\-->
        <div class="sportsmagazine-main-header">
            <div class="container">
                <div class="row">
                    <aside class="col-md-2"><a href="index.php" class="sportsmagazine-logo"><img src="images/nba-logoman-75-word_white.svg" alt="" height="100" width="400"></a></aside>
                    <div class="col-md-10">
                        <div class="sportsmagazine-right-section">
                            <nav class="navbar navbar-default">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="true">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="collapse navbar-collapse" id="navbar-collapse-1">

                                    <ul class="nav navbar-nav">
                                        <li<?php if($menu==HOME) echo " class=\"active\""?>><a href="index.php">Página principal</a>
                                        </li>

                                        <li class="sportsmagazine-megamenu-li"><a href="jogos.php">jogos</a>
                                        </li>

                                        <li<?php if($menu==NOTICIAS) echo " class=\"active\""?>><a href="noticias.php"> NOTÍCIAS </a>
                                        </li>

                                        <li><a href="artigos.php">Artigos NBA</a>
                                        </li>

                                    </ul>

                                </div>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
?>
