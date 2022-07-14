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
     <?php if($menu==HOME) echo "<title> página Principal </title>" ?>
     <?php if($menu==JOGOS) echo "<title>Jogos </title>" ?>
     <?php if($menu==NOTICIAS) echo "<title> Nóticias </title>" ?>
     <?php if($menu==ARTIGOS) echo "<title>Artigos </title>" ?>

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

                                        <li<?php if($menu==JOGOS) echo " class=\"active\""?> class="sportsmagazine-megamenu-li"><a href="jogos.php">JOGOS</a>
                                        </li>

                                        <li<?php if($menu==NOTICIAS) echo " class=\"active\""?>><a href="noticias.php"> NOTÍCIAS </a>
                                        </li>

                                        <li<?php if($menu==ARTIGOS) echo " class=\"active\""?>><a href="artigosNba.php">Artigos NBA</a>
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

function drawBottom(){
    ?>
            <!--// Footer \\-->
        <footer id="sportsmagazine-footer" class="sportsmagazine-footer-one">

            <!--// Footer Widget \\-->
            <div class="sportsmagazine-footer-widget">
                <div class="container">
                    <div class="row">
                        <!--// Widget Contact Info \\-->
                        <aside class="col-md-4 widget widget_contact_info">
                            <a href="index.html" class="footer-logo"><img src="images/nba-logoman-75-word_white.svg" alt=""></a>

                            <ul class="sportsmagazine-social-network">

                                <!--  <li><a href="https://twitter.com/login" class="sportsmagazine-colorhover fa fa-twitter-square"></a>   GOAT page</li> -->

                            </ul>
                            <ul class="sportsmagazine-info-list">
                                <li><i class="fa fa-envelope"></i> <span><a>goatbasket@gmail.com</a></span></li>
                            </ul>
                        </aside>
                        <!--// Widget Contact Info \\-->

                        <!--// Widget Twitter \\-->
                        <aside class="col-md-4 widget widget_twitter">
                            <div class="footer-widget-title"><h2>Twitter Feeds</h2></div>
                            <ul>
                                <li>
                                    <i class="fa fa-twitter"></i> <span>@ESPNNBA</span>
                                    <p> Isaiah Thomas está de volta a Nba , assina novo contrato de 10 dias com os hornets <a href="https://twitter.com/espnnba/status/1499215162695430149">@ESPNNBA</a></p>

                                </li>
                                <li>
                                    <i class="fa fa-twitter"></i> <span>@NBATV</span>
                                    <p>Ja Morant com recorde de pontos e incrível «buzzer-beater»  <a href="https://twitter.com/nbaportugalcom/status/1498602708806295552">@NbaTv</a></p>

                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>




                        <!--// Footer Widget \\-->



        </footer>
        <!--// Footer \\-->

        <div class="clearfix"></div>
    </div>
    <!--// Main Wrapper \\-->

    <!-- SearchModal -->
        <div class="searchmodal modal fade" id="searchModal" tabindex="-1" role="dialog">
            <a href="#" data-dismiss="modal" class="sportsmagazine-modal-close"><i class="icon-uniF106"></i></a>
            <div class="modal-dialog" role="document">
                <div class="container">
                    <div class="row">
                        <form class="sportsmagazine-search-box">
                            <input type="text" value="Search Your Keyword" onblur="if(this.value == '') { this.value ='Search Your Keyword'; }" onfocus="if(this.value =='Search Your Keyword') { this.value = ''; }">
                            <input type="submit" value="">
                            <i class="fa fa-search"></i>
                        </form>
                    </div>
                </div>
            </div>
        </div>






    <!-- jQuery (necessary for JavaScript plugins) -->
    <script type="text/javascript" src="script/jquery.js"></script>
    <script type="text/javascript" src="script/bootstrap.min.js"></script>
    <script type="text/javascript" src="script/slick.slider.min.js"></script>
    <script type="text/javascript" src="script/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="script/fancybox.pack.js"></script>
    <script type="text/javascript" src="script/isotope.min.js"></script>
    <script type="text/javascript" src="script/progressbar.js"></script>
    <script type="text/javascript" src="script/counter.js"></script>
    <script type="text/javascript" src="script/functions.js"></script>

  </body>

</html>
        <?php
}
    ?>
