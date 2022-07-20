
<?php
include_once("includes/body.inc.php");
drawTop(HOME);
global $con;
?>
<link rel = "icon" type = "image/svg" href = "images/nba-logoman-75-word_white.svg">

  <body style="background: white">

    <!--// Main Wrapper \\-->
    <div class="sportsmagazine-main-wrapper">

        <!--// Header \\-->

        <!--// Header \\-->

		<!--// Main Banner \\-->
		<div class="sportsmagazine-banner">

            <!--// Slider \\-->
            <div class="sportsmagazine-banner-one">

                <div class="sportsmagazine-banner-one-layer">
                   <img src="Página%20principal%20img/jalen-green.png" alt="">
                    <span class="sportsmagazine-banner-pattren"></span>
                    <div class="sportsmagazine-banner-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sportsmagazine-banner-wrap">
                                        <h1><span>Encontra O melhor </span> sobre <strong class="sportsmagazine-color">a NBA  </strong> <span>  </span></h1>
                                        <p> </p>

                                    </div>
                                    <div class="sportsmagazine-banner-thumb"> <img src="Página%20principal%20img/Stephen-Curry-PNG-Transparent.png" alt=""> </div>
                                    <div class= "sportsmagazine-banner-thumb"> <img src="Página%20principal%20img/Stephen-Curry-PNG-Transparent.png" alt=""> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="sportsmagazine-banner-one-layer">
                    <img src="Página%20principal%20img/curry-banner.jpg" alt="">
                    <span class="sportsmagazine-banner-pattren"></span>
                    <div class="sportsmagazine-banner-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sportsmagazine-banner-wrap">
                                        <h1><span>Encontra O melhor </span> sobre <strong class="sportsmagazine-color">a NBA  </strong> <span>  </span></h1>
                                        <p> </p>

                                    </div>
                                    <div class="sportsmagazine-banner-thumb"> <img src="Página%20principal%20img/Stephen-Curry-PNG-Transparent.png" alt=""> </div>
                                    <div class="sportsmagazine-banner-thumb"> <img src="Página%20principal%20img/Stephen-Curry-PNG-Transparent.png" alt=""> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sportsmagazine-banner-one-layer">
                    <img src="Página%20principal%20img/LeBron-banner.png" alt="">
                    <span class="sportsmagazine-banner-pattren"></span>
                    <div class="sportsmagazine-banner-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sportsmagazine-banner-wrap">
                                        <h1><span>Encontra O melhor </span> sobre <strong class="sportsmagazine-color">a NBA  </strong> <span>  </span></h1>
                                        <p> </p>

                                    </div>
                                    <div class="sportsmagazine-banner-thumb"> <img src="Página%20principal%20img/Stephen-Curry-PNG-Transparent.png" alt=""> </div>
                                    <div class="sportsmagazine-banner-thumb"> <img src="Página%20principal%20img/Stephen-Curry-PNG-Transparent.png" alt=""> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            </div>






            </div>
            <!--// Slider \\-->

        </div>
		<!--// Main Banner \\-->

		<!--// Main Content \\-->
		<div class="sportsmagazine-main-content">

			<!--// Main Section \\-->
			<div class="sportsmagazine-main-section">
				<div class="container">
					<div class="row">

                        <!--// Fixture Slider \\-->
						<div class="col-md-12">
                            <div class="sportsmagazine-fixture-slider">
                                <?php
                                    $sql="Select jogos.*
                                    , casa.clubeNome as nomeCasa
                                    , casa.clubeSobrenome as sobrenomeCasa
                                    , casa.clubeLogoURL as logoCasa
                                    , fora.clubeNome as nomeFora
                                    , fora.clubeSobrenome as sobrenomeFora
                                    , fora.clubeLogoURL as logoFora
                                    from jogos 
                                    inner join clubes as casa on casa.clubeId=jogoCasaClubeId
                                    inner join clubes as fora on fora.clubeId=jogoForaClubeId
                                    order by jogoData desc limit 10 ";
                                    $res=mysqli_query($con,$sql);
                                    while($dados=mysqli_fetch_array($res)){


                                ?>
                                <div class="sportsmagazine-fixture-slider-layer">
                                    <time datetime="2008-02-14 20:00"><?php echo strftime(' %d de %B de %Y', strtotime($dados['jogoData']));?></time>
                                    <ul class="sportsmagazine-bgcolor">
                                        <li class="first-child"><?php echo $dados['sobrenomeCasa']?><span><?php echo $dados['jogoResultadoCasa']?></span></li>
                                        <li><?php echo $dados['sobrenomeFora']?><span><?php echo $dados['jogoResultadoFora']?></span></li>
                                    </ul>
                                </div>
                                <?php
                                }
                                ?>





                            </div>
                        </div>
                        <!--// Fixture Slider \\-->

                        <!--// Content \\-->
                        <div class="col-md-8">

                            <!--// Fancy Title \\--> <div class="sportsmagazine-fancy-title"><h2> Notícias</h2></div> <!--// Fancy Title \\-->
                            <!--// Featured Slider \\-->

                            <div class="sportsmagazine-blog sportsmagazine-bloglarge">
                                <ul class="row">
                                    <?php
                                    $sql="select * from noticias order by noticiaData desc limit 3";
                                    $res=mysqli_query($con,$sql);
                                    while($dados=mysqli_fetch_array($res)){
                                    ?>


                                    <li class="col-md-12">
                                        <figure><a href="noticias.php"><img src="<?php echo $dados['noticiaImagemURL']?>" alt=""></a></figure>
                                        <div class="sportsmagazine-bloglarge-text">
                                            <time datetime=""> <?php echo strftime('%A, %d de %B de %Y', strtotime($dados['noticiaData'])); ?>    </time>
                                            <h3><a href="blog-detail.php?id=<?php echo $dados['noticiaId']?>"> <?php echo $dados['noticiaTitulo']  ?></a></h3>
                                            <p>  </p>
                                            <a href="blog-detail.php?id=<?php echo $dados['noticiaId']?>" class="sportsmagazine-readmore-btn">LER MAIS <i class="fa fa-arrow-circle-o-right"></i></a>

                                        </div>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>



                            <!--// Latest Match Result \\-->



                        </div>
                        <!--// Content \\-->

                        <!--// SideBaar \\-->
                        <aside class="col-md-4">

                            <!--// Widget TeamRanking \\-->
                            <div class="widget widget_team_ranking">
                                <div class="sportsmagazine-fancy-title"><h2>Conferência Este</h2></div>
                                <div class="ranking-title-table">
                                    <ul class="ranking-title-row">
                                        <li>Team Rank</li>
                                        <li>W</li>
                                        <li>L</li>
                                        <li>WIN%</li>
                                    </ul>
                                </div>
                                <?php
                                $sql="select clubeId
                                        , clubeNome
                                        , clubeSobrenome
                                        , clubeLogoURL
                                        , ifnull(winsHome,0) as wHome
                                        , ifnull(defeatsHome,0) as dHome
                                        , ifnull(winsAway,0) as wAway
                                        , ifnull(defeatsAway,0) as dAway
                                        from clubes left join (select jogoCasaClubeId, count(*) as winsHome
                                                                                        from jogos
                                                                                        where jogoResultadoCasa>jogoResultadoFora
                                                                                        group by 1)as tabelaW1 on clubeId=tabelaW1.jogoCasaClubeId
                                                                left join (select jogoCasaClubeId, count(*) as defeatsHome
                                                                                        from jogos
                                                                                        where jogoResultadoCasa<jogoResultadoFora
                                                                                        group by 1)as tabelaD1 on clubeId=tabelaD1.jogoCasaClubeId 						left join (select jogoForaClubeId, count(*) as winsAway
                                                                                        from jogos
                                                                                        where jogoResultadoCasa<jogoResultadoFora
                                                                                        group by 1)as tabelaW2 on clubeId=tabelaW2.jogoForaClubeId
                                                                left join (select jogoForaClubeId, count(*) as defeatsAway
                                                                                        from jogos
                                                                                        where jogoResultadoCasa>jogoResultadoFora
                                                                                        group by 1)as tabelaD2 on clubeId=tabelaD2.jogoForaClubeId
                                        where clubeConferencia='east'
                                        order by (wHome+wAway)/(wHome+wAway+dHome+dAway) desc
                                        limit 8";

                                $res=mysqli_query($con,$sql);
                                $i=1;
                                while($dados=mysqli_fetch_array($res)){
                                    $totW=intval($dados['wHome'])+intval($dados['wAway']);
                                    $totD=intval($dados['dHome'])+intval($dados['dAway']);
                                    $score=floatval($totW/($totD+$totW))*1000;
                                    if($score==1000)
                                        $scoreF='1.00';
                                    else
                                        $scoreF='.'.sprintf("%03d", $score);
                            ?>


                                <div class="ranking-content-table">
                                    <ul class="ranking-content-row">
                                        <li><?php echo $i++?></li>
                                        <li> <img src="<?php echo $dados['clubeLogoURL']?>" alt=""> <div class="ranking-logo">
                                                <b><?php echo $dados['clubeNome']?></b> <span><?php echo $dados['clubeSobrenome']?></span> </div> </li>
                                        <li style="width: 13%"><b><?php echo $totW?></b></li>
                                        <li><?php echo $totD?></li>
                                        <li><?php echo $scoreF?></li>
                                    </ul>
                                </div>

                                <?php
                                }
                                ?>
                                <br>
                                <div class="sportsmagazine-bloglarge-text">

                                    <h4 align="center"><a  href="fullstanding.php"><b><p class="dotted"> Classificação Inteiria</p> </b>  </a></h4>
                                    </div>

                            <!--// Widget TeamRanking 2 \\-->

                                <div class="widget widget_team_ranking">
                                    <div class="sportsmagazine-fancy-title"><h2>Conferência Oeste</h2></div>
                                    <div class="ranking-title-table">
                                        <ul class="ranking-title-row">
                                            <li>Team Rank</li>
                                            <li>W</li>
                                            <li>L</li>
                                            <li>WIN%</li>
                                        </ul>
                                    </div>
                                    <?php
                                    $sql="select clubeId
                                        , clubeNome
                                        , clubeSobrenome
                                        , clubeLogoURL
                                        , ifnull(winsHome,0) as wHome
                                        , ifnull(defeatsHome,0) as dHome
                                        , ifnull(winsAway,0) as wAway
                                        , ifnull(defeatsAway,0) as dAway
                                        from clubes left join (select jogoCasaClubeId, count(*) as winsHome
                                                                                        from jogos
                                                                                        where jogoResultadoCasa>jogoResultadoFora
                                                                                        group by 1)as tabelaW1 on clubeId=tabelaW1.jogoCasaClubeId
                                                                left join (select jogoCasaClubeId, count(*) as defeatsHome
                                                                                        from jogos
                                                                                        where jogoResultadoCasa<jogoResultadoFora
                                                                                        group by 1)as tabelaD1 on clubeId=tabelaD1.jogoCasaClubeId 						left join (select jogoForaClubeId, count(*) as winsAway
                                                                                        from jogos
                                                                                        where jogoResultadoCasa<jogoResultadoFora
                                                                                        group by 1)as tabelaW2 on clubeId=tabelaW2.jogoForaClubeId
                                                                left join (select jogoForaClubeId, count(*) as defeatsAway
                                                                                        from jogos
                                                                                        where jogoResultadoCasa>jogoResultadoFora
                                                                                        group by 1)as tabelaD2 on clubeId=tabelaD2.jogoForaClubeId
                                        where clubeConferencia='west'
                                        order by (wHome+wAway)/(wHome+wAway+dHome+dAway) desc
                                        limit 8";

                                    $res=mysqli_query($con,$sql);
                                    $i=1;
                                    while($dados=mysqli_fetch_array($res)){
                                        $totW=intval($dados['wHome'])+intval($dados['wAway']);
                                        $totD=intval($dados['dHome'])+intval($dados['dAway']);
                                        $score=floatval($totW/($totD+$totW))*1000;
                                        if($score==1000)
                                            $scoreF='1.00';
                                        else
                                            $scoreF='.'.sprintf("%03d", $score);
                                        ?>


                                        <div class="ranking-content-table">
                                            <ul class="ranking-content-row">
                                                <li><?php echo $i++?></li>
                                                <li> <img src="<?php echo $dados['clubeLogoURL']?>" alt=""> <div class="ranking-logo">
                                                        <b><?php echo $dados['clubeNome']?></b> <span><?php echo $dados['clubeSobrenome']?></span> </div> </li>
                                                <li style="width: 13%"><b><?php echo $totW?></b></li>
                                                <li><?php echo $totD?></li>
                                                <li><?php echo $scoreF?></li>
                                            </ul>
                                        </div>

                                        <?php
                                    }
                                    ?>

                                    <div class="sportsmagazine-bloglarge-text">

                                        <h4 align="center"><a  href="fullstanding.php"><b><p class="dotted"> Classificação Inteiria</p> </b>  </a></h4>
                                    </div>
                            <!--// Widget TeamRanking \\-->

                            <!--// Widget Popular News \\-->
                            <div class="widget widget_popular_news">
                                <!--
                                <div class="sportsmagazine-fancy-title"><h2>News</h2></div>
                                <ul>
                                    <li>
                                        <span>01</span>
                                        <div class="popular_news_text">
                                            <a href="noticias.html">Cam Reddish, dos Knicks, fora da temporada com lesão no ombro</a>
                                            <time datetime="2008-02-14 20:00">10 março, 2022</time>
                                        </div>
                                    </li>
                                    <li class="widget-injuries">
                                        <span>02</span>
                                        <div class="popular_news_text">
                                            <a href="noticias.html">The Clovers defense must reinvent itself without</a>
                                            <time datetime="2008-02-14 20:00">04 março, 2022</time>
                                        </div>
                                    </li>
                                    <li class="widget-theleague">
                                        <span>03</span>
                                        <div class="popular_news_text">
                                            <a href="noticias.html">As dificuldades de Russell Westbrook foram uma parte fundamental – mas não a única razão – da errática temporada 2021-22 dos Lakers.</a>
                                            <time datetime="2008-02-14 20:00">04 março, 2022</time>
                                        </div>
                                    </li>
                                    <li>
                                        <span>04</span>
                                        <div class="popular_news_text">
                                            <a href="noticias.html">Peso das expectativas inegáveis para Russell Westbrook, Lakers</a>
                                            <time datetime="2008-02-14 20:00"> 04 Março , 2022</time>
                                        </div>
                                    </li>
                                    <li>
                                        <span>05</span>
                                        <div class="popular_news_text">
                                            <a href="noticias.html">Kyle Kuzma e Kentavious Caldwell-Pope não estão ressentidos com o Lakers após troca</a>
                                            <time datetime="2008-02-14 20:00">10 Março , 2022</time>
                                        </div>
                                    </li>
                                </ul>
                                -->
                            </div>

                            <!--// Widget Next Match \\-->
                            <div class="widget widget_next_match">
                                <!--
                                <div class="sportsmagazine-fancy-title"><h2 align="center">Próximo jogo</h2></div>
                                <div class="widget_next_match_title">
                                    <h5 >Temporada atual</h5>
                                    <span>Quinta feira, 9 março , 2022</span>
                                </div>
                                <ul>
                                    <li>
                                        <img src="extra-images/torontologo.svg" alt="">
                                        <h6><a href="fixture-detail.html">Toronto </a></h6>
                                        <small></small>
                                    </li>
                                    <li>
                                        <div class="widget_next_match_option">
                                            <h6>07:00 pm</h6>
                                            <small>FTX arena</small>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="extra-images/miamilogo.svg" alt="">
                                        <h6><a href="fixture-detail.html">Miami</a></h6>
                                        <small></small>
                                    </li>
                                </ul>
                                <div class="widget_match_countdown">
                                    <h6>Contagem regressiva:</h6>
                                    <div id="sportsmagazine-countdown"></div>
                                </div>
                                <a href="Jogos.html" class="widget_match_btn">Ver lista de jogos</a>
                                -->
                            </div>
                            </div>


                            <img src="Página%20principal%20img/Summer-League-2022-logo3.jpg" alt="">

                        </aside>

                        <!--// SideBaar \\-->

                    </div>
                </div>
            </div>


        </div>




        <div class="clearfix"></div>
    </div>
    <!--// Main Wrapper \\-->








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
drawBottom();
?>