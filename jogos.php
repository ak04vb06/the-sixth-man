<?php
include_once("includes/body.inc.php");
drawTop(JOGOS);
global $con;
$dataInij="";
$dataFimj="";
$sql="Select jogos.*
            , casa.clubeNome as nomeCasa
            , casa.clubeSobrenome as sobrenomeCasa
            , casa.clubeLogoURL as logoCasa
            , fora.clubeNome as nomeFora
            , fora.clubeSobrenome as sobrenomeFora
            , fora.clubeLogoURL as logoFora
            from jogos 
            inner join clubes as casa on casa.clubeId=jogoCasaClubeId
            inner join clubes as fora on fora.clubeId=jogoForaClubeId ";
if(isset($_POST['dataInij'])&&isset($_POST['dataFimj'])){
    $sql.=" where jogoData between '".$_POST['dataInij']."' and '".$_POST['dataFimj']."'";
    $dataInij=$_POST['dataInij'];
    $dataFimj=$_POST['dataFimj'];
}
$sql.=" order by jogoData desc";
$res=mysqli_query($con,$sql);
?>
<link rel = "icon" type = "image/svg" href = "images/nba-logoman-75-word_white.svg">
  <body>


        </header>
        <!--// Header \\-->

        <div class="sportsmagazine-banner">

            <!--// Slider \\-->
            <div class="sportsmagazine-banner-one">

                <div class="sportsmagazine-banner-one-layer">
                    <img src="images/bannerJogos/Jabanner.png" alt="">
                    <span class="sportsmagazine-banner-pattren"></span>
                    <div class="sportsmagazine-banner-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sportsmagazine-banner-wrap">
                                        <h1><span>Jogos e resultados </span> Sobre <strong class="sportsmagazine-color">a NBA  </strong> <span>  </span></h1>
                                        <p> </p>

                                    </div>
                                    <div class="sportsmagazine-banner-thumb"> <img src="Página%20principal%20img/" alt=""> </div>
                                    <div class="sportsmagazine-banner-thumb"> <img src="Página%20principal%20img/" alt=""> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="sportsmagazine-banner-one-layer">
                    <img src="images/bannerJogos/kyrieBanner2.png" alt="">
                    <span class="sportsmagazine-banner-pattren"></span>
                    <div class="sportsmagazine-banner-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sportsmagazine-banner-wrap">
                                        <h1><span>Jogos e resultados </span> sobre <strong class="sportsmagazine-color">a NBA  </strong> <span>  </span></h1>
                                        <p> </p>

                                    </div>
                                    <div class="sportsmagazine-banner-thumb"> <img src="" alt=""> </div>
                                    <div class="sportsmagazine-banner-thumb"> <img src="" alt=""> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sportsmagazine-banner-one-layer">
                    <img src="images/bannerJogos/tatumBanner.png" alt="">
                    <span class="sportsmagazine-banner-pattren"></span>
                    <div class="sportsmagazine-banner-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sportsmagazine-banner-wrap">
                                        <h1><span>Jogos e resultados </span> sobre <strong class="sportsmagazine-color">a NBA  </strong> <span>  </span></h1>
                                        <p> </p>

                                    </div>
                                    <div class="sportsmagazine-banner-thumb"> <img src="" alt=""> </div>
                                    <div class="sportsmagazine-banner-thumb"> <img src="" alt=""> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





        </div>
        <!--// SubHeader \\-->

		<!--// Main Content \\-->
		<div   class="sportsmagazine-main-content">

            <div align="center" class="">
                <form action="" method="post">
                    <tr >
                        <td align="right">
                            <strong>Filtro: </strong>
                        </td>
                        <td colspan="2">
                            <b>Data início</b>  <input type="date" name="dataInij" value="<?php echo $dataInij;?>">
                        </td>
                        <td colspan="2">
                            <b>Data Fim</b>  <input type="date" name="dataFimj" value="<?php echo $dataFimj;?>">
                        </td>
                        <td>
                            <input type="submit" value="Aplicar">
                        </td>

                    </tr>
                </form>
            </div>


			<!--// Main Section \\-->
			<div class="sportsmagazine-main-section sportsmagazine-fixture-listfull">
				<div class="container">
					<div class="row">
						
						<div class="col-md-12">
                            <div class="sportsmagazine-fixture sportsmagazine-fixture-list">
                                <ul class="row">

                                    <?php
                                    setlocale(LC_TIME, 'pt_PT', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                                    date_default_timezone_set('Europe/Lisbon');
                                    while($dados=mysqli_fetch_array($res)){
                                    ?>
                                    <li class="col-md-12">
                                        <div class="sportsmagazine-fixture-wrap">
                                            <div class="sportsmagazine-teams-match">
                                                <div class="sportsmagazine-first-team">
                                                    <figure><img src="<?php echo $dados['logoCasa']?>" alt=""></figure>
                                                    <div class="sportsmagazine-first-team-info">

                                                        <span ><b><?php echo $dados['sobrenomeCasa']?></b></span>
                                                    </div>
                                                </div>
                                                <div class="sportsmagazine-match-view">
                                                    <time>   </time><h5><?php echo strftime(' %d de %B de %Y', strtotime($dados['jogoData'])); ?></h5>
                                                    <span ><?php echo $dados['jogoResultadoCasa']." - ".$dados['jogoResultadoFora']?></span>
                                                </div>
                                                <div  class="sportsmagazine-second-team">
                                                    <figure><img src="<?php echo $dados['logoFora']?>" alt=""></figure>
                                                    <div class="sportsmagazine-second-team-info">

                                                        <span><b ><?php echo $dados['sobrenomeFora']?></b></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sportsmagazine-buy-ticket" style="text-align: center">
                                                <table class="table" >
                                                    <?php
                                                    $sql="select * from parciais where parcialJogoId=".$dados['jogoId'];
                                                    $resP=mysqli_query($con,$sql);
                                                    $par=array();
                                                    $i=1;
                                                    while ($dadosP=mysqli_fetch_array($resP)){

                                                        $par[$i]['casa']=$dadosP['parcialCasaPontos'];
                                                        $par[$i]['fora']=$dadosP['parcialForaPontos'];
                                                        $i++;
                                                    }

                                                    ?>
                                                    <tr>
                                                        <th style="width: 20%">&nbsp;
                                                        <th style="width: 10%">1Q</th>
                                                        <th style="width: 10%">2Q</th>
                                                        <th style="width: 10%">3Q</th>
                                                        <th style="width: 10%">4Q</th>
                                                    </tr>
                                                    <tr align="center">
                                                        <td><b><?php echo $dados['sobrenomeCasa']?></b></td>
                                                        <td><?php echo $par[1]['casa']?></td>
                                                        <td><?php echo $par[2]['casa']?></td>
                                                        <td><?php echo $par[3]['casa']?></td>
                                                        <td><?php echo $par[4]['casa']?></td>
                                                    </tr>
                                                    <tr align="center">
                                                        <td><b><?php echo $dados['sobrenomeFora']?></b></td>
                                                        <td><?php echo $par[1]['fora']?></td>
                                                        <td><?php echo $par[2]['fora']?></td>
                                                        <td><?php echo $par[3]['fora']?></td>
                                                        <td><?php echo $par[4]['fora']?></td>
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