<?php
include_once("includes/body.inc.php");
drawTop(JOGOS);
global $con;
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
            order by jogoData asc";
$res=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($res);

?>
  <body>


        </header>
        <!--// Header \\-->

		<!--// SubHeader \\-->
        <div class="sportsmagazine-subheader">
            <span class="subheader-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Jogos</h1>
                    </div>
                    <div class="col-md-12">

                    </div>
                </div>
            </div>
        </div>
        <!--// SubHeader \\-->

		<!--// Main Content \\-->
		<div class="sportsmagazine-main-content">

			<!--// Main Section \\-->
			<div class="sportsmagazine-main-section sportsmagazine-fixture-listfull">
				<div class="container">
					<div class="row">
						
						<div class="col-md-12">
                            <div class="sportsmagazine-fixture sportsmagazine-fixture-list">
                                <ul class="row">
                                    <li class="col-md-12">
                                        <div class="sportsmagazine-fixture-wrap">
                                            <div class="sportsmagazine-teams-match">
                                                <?php
                                                while($dados=mysqli_fetch_array($res)){
                                                ?>
                                                <div class="sportsmagazine-first-team">
                                                    <figure><img src="<?php echo $dados['logoCasa']?>" alt=""></figure>
                                                    <div class="sportsmagazine-first-team-info">
                                                        <h6><a><?php echo $dados['nomeCasa']?></a></h6>
                                                        <span><b><?php echo $dados['sobrenomeCasa']?></b></span>
                                                    </div>
                                                </div>
                                                <div class="sportsmagazine-match-view">
                                                    <h5><?php echo $dados['jogoData']?></h5>
                                                    <span><?php echo $dados['jogoResultadoCasa']." - ".$dados['jogoResultadoFora']?></span>
                                                </div>
                                                <div class="sportsmagazine-second-team">
                                                    <figure><img src="extra-images/clevelandlogo.svg" alt=""></figure>
                                                    <div class="sportsmagazine-second-team-info">
                                                        <h6><a>Cleveland</a></h6>
                                                        <span><b>Cavaliers</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sportsmagazine-buy-ticket" style="text-align: center">
                                                <table class="table" >

                                                    <tr>
                                                        <th style="width: 60%">&nbsp;</th>
                                                        <th style="width: 10%">1Q</th>
                                                        <th style="width: 10%">2Q</th>
                                                        <th style="width: 10%">3Q</th>
                                                        <th style="width: 10%">4Q</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Yorkshire</td>
                                                        <td>10</td>
                                                        <td>10</td>
                                                        <td>10</td>
                                                        <td>10</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sharks</td>
                                                        <td>10</td>
                                                        <td>10</td>
                                                        <td>10</td>
                                                        <td>10</td>
                                                    </tr>

                                                </table>


                                            </div>



                                        </div>
                                    </li>
                                    <?php
                                    }
                                    ?>

                                </ul>
                            </div>
                            <!--// Pagination \\-->

                            <!--// Pagination \\-->
                        </div>


					</div>
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


        </footer>











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