<?php
    include_once("includes/body.inc.php");
    drawTop(NOTICIAS);
    global $con;
    $sql="select * from noticias";
    $res=mysqli_query($con,$sql);

?>
<!--// MainSection \\-->
<div class="sportsmagazine-banner-one">
    <div class="sportsmagazine-banner-one-layer">
        <img src="extra-images/ayton-on-gianis.jpg " alt="">
        <span class="sportsmagazine-banner-pattren"></span>
        <div class="sportsmagazine-banner-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sportsmagazine-banner-wrap">
                            <h1><span>NOTÍCIAS DA NBA </span> <strong class="sportsmagazine-color">  </strong>  <span> </span>     </h1>
                            <p> </p>

                        </div>
                        <div class="sportsmagazine-banner-thumb"> <img src="extra-images/kdbackground.png  " alt="" >  </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</header>
        <!--// Header \\-->

		<!--// SubHeader \\-->

        <!--// SubHeader \\-->

		<!--// Main Content \\-->
		<div class="sportsmagazine-main-content">

			<!--// Main Section \\-->
			<div class="sportsmagazine-main-section sportsmagazine-bloglarge-full">
				<div class="container">
					<div class="row">
						
						<div class="col-md-9">
                            <div class="sportsmagazine-blog sportsmagazine-bloglarge">
                                <ul class="row">
                                    <?php
                                    setlocale(LC_TIME, 'pt_PT', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                                    date_default_timezone_set('Europe/Lisbon');

                                    while($dados=mysqli_fetch_array($res)){
                                    ?>
                                    <li class="col-md-12">
                                        <figure><a href="blog-detail.html"><img src="<?php echo $dados['noticiaImagemURL']?>" alt=""></a></figure>
                                        <div class="sportsmagazine-bloglarge-text">
                                            <time datetime="2008-02-14 20:00"><?php echo strftime('%A, %d de %B de %Y', strtotime($dados['noticiaData'])); ?></time>
                                            <h3><a href="blog-detail.html"><?php echo $dados['noticiaTitulo']?></a></h3>
                                            <p></p>
                                            <a href="blog-detail.html" class="sportsmagazine-readmore-btn">READ MORE <i class="fa fa-arrow-circle-o-right"></i></a>
                                            <ul class="sportsmagazine-article-options">
                                                <li><a href="#404.html"><i class="fa fa-thumbs-o-up"></i> 320</a></li>
                                                <li><a href="#404.html"><i class="fa fa-eye"></i> 840</a></li>
                                                <li><a href="#404.html"><i class="fa fa-user"></i> Julia Martyn</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <!--// Pagination \\-->
                            <div class="sportsmagazine-pagination">
                              <ul class="page-numbers">
                                 <li><a class="previous page-numbers" href="404.html"><span aria-label="Next"><i class="fa fa-angle-left"></i></span></a></li>
                                 <li><span class="page-numbers current">1</span></li>
                                 <li><a class="page-numbers" href="404.html">2</a></li>
                                 <li><a class="page-numbers" href="404.html">3</a></li>
                                 <li><a class="page-numbers" href="404.html">4</a></li>
                                 <li><a class="next page-numbers" href="404.html"><span aria-label="Next"><i class="fa fa-angle-right"></i></span></a></li>
                              </ul>
                            </div>
                            <!--// Pagination \\-->
                        </div>
                        
                        <!--// SideBar \\-->
                        <aside class="col-md-3">
                            
                            <!--// Widget Popular Post \\-->







                    </aside>
					</div>
				</div>
			</div>


		</div>
		<!--// Main Content \\-->


        <!-- // Footer \\-->
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


    <!--// Main Wrapper \\-->

    <!-- SearchModal -->


    <!-- LoginModal -->


    <!-- SignupModal -->




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