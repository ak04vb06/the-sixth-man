<?php
include_once("includes/body.inc.php");
drawTop(JOGOS);
global $con;
?>



        </header>
        <!--// Header \\-->

		<!--// SubHeader \\-->
        <div class="sportsmagazine-subheader">
            <span class="subheader-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Classificação</h1>
                    </div>
                    <div class="col-md-12">
                        <ul class="sportsmagazine-breadcrumb">
                            <li><a href="">Conferência este</a></li>
                            <li>Conferência oeste</li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
        <!--// SubHeader \\-->

		<!--// Main Content \\-->
		<div class="sportsmagazine-main-content">

			<!--// Main Section \\-->
			<div class="sportsmagazine-main-section sportsmagazine-fullstanding-full">
				<div class="container">
                    <aside class="col-md-12">

                        <!--// Widget TeamRanking \\-->
                        <div class="widget widget_team_ranking">
                            <div class="sportsmagazine-fancy-title"><h2>Conferência Este</h2></div>
                            <div class="ranking-title-table" style="padding: 16px 0px 15px 18px !important;">
                                <ul class="ranking-title-row">
                                    <li class="text-left" style="width: 20%">Rank</li>
                                    <li style="width: 35%">Team</li>
                                    <li style="width: 13%">W</li>
                                    <li style="width: 13%">L</li>
                                    <li style="width: 19%">WIN%</li>
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
                                        ";

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
                                        <li style="width: 20%"><?php echo ($i++)?></li>
                                        <li style="width: 35%"><img src="<?php echo $dados['clubeLogoURL']?>" alt=""> <div class="ranking-logo">
                                                <b><?php echo $dados['clubeNome']?></b> <span><?php echo $dados['clubeSobrenome']?></span> </div> </li>
                                        <li style="width: 13%"><b><?php echo $totW?></b></li>
                                        <li style="width: 13%"><?php echo $totD?></li>
                                        <li style="width: 19%"><?php echo $scoreF?></li>
                                    </ul>
                                </div>

                                <?php
                            }
                            ?>
                            <p>
                                <br>
                                <br>
                                <br>
                            </p>

                            <!--// Widget TeamRanking 2 \\-->

                            <div class="widget widget_team_ranking">
                                <div class="sportsmagazine-fancy-title"><h2>Conferência Oeste</h2></div>
                                <div class="ranking-title-table" style="padding: 16px 0px 15px 18px !important;">
                                    <ul class="ranking-title-row">
                                        <li class="text-left" style="width: 20%">Rank</li>
                                        <li style="width: 35%">Team</li>
                                        <li style="width: 13%">W</li>
                                        <li style="width: 13%">L</li>
                                        <li style="width: 19%">WIN%</li>
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
                                        ";

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
                                            <li style="width: 20%"><?php echo ($i++)?></li>
                                            <li style="width: 35%"><img src="<?php echo $dados['clubeLogoURL']?>" alt=""> <div class="ranking-logo">
                                                    <b><?php echo $dados['clubeNome']?></b> <span><?php echo $dados['clubeSobrenome']?></span> </div> </li>
                                            <li style="width: 13%"><b><?php echo $totW?></b></li>
                                            <li style="width: 13%"><?php echo $totD?></li>
                                            <li style="width: 19%"><?php echo $scoreF?></li>
                                        </ul>
                                    </div>

                                    <?php
                                }
                                ?>


                            </div>




                    </aside>


				</div>
			</div>
			<!--// Main Section \\-->

		</div>
		<!--// Main Content \\-->

		<!--// Footer \\-->
        <footer id="sportsmagazine-footer" class="sportsmagazine-footer-one">

            <!--// Footer Widget \\-->
            <div class="sportsmagazine-footer-widget">
                <div class="container">
                    <div class="row">
                        <!--// Widget Contact Info \\-->
                        <aside class="col-md-4 widget widget_contact_info">
                            <a href="index.html" class="footer-logo"><img src="images/nba-logoman-75-word_white.svg " alt=""></a>

                            <ul class="sportsmagazine-social-network">

                                <!--  <li><a href="https://twitter.com/login" class="sportsmagazine-colorhover fa fa-twitter-square"></a>   GOAT page</li> -->

                            </ul>
                            <ul class="sportsmagazine-info-list">

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


        </footer>
        <!--// Footer \\-->

	<div class="clearfix"></div>
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
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript" src="script/functions.js"></script>

  </body>

</html>
