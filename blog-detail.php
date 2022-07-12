<?php
    include_once("includes/body.inc.php");
    drawTop(NOTICIAS);
    global $con;
    $sql="select * from noticias";
    $res=mysqli_query($con,$sql);
    $dados=mysqli_fetch_array($res);

?>
  <body>
	
    <!--// Main Wrapper \\-->
    <div class="sportsmagazine-main-wrapper">

        <!--// Header \\-->
        <header id="sportsmagazine-header" class="sportsmagazine-header-one">
            
            <!--// TopStrip \\-->
           <!--//  <div class="sportsmagazine-topstrip">
                <div class="container">

                </div>
            </div>   \\-->
            <!--// TopStrip \\-->

            <!--// MainSection \\-->

            <!--// MainSection \\-->

        </header>
        <!--// Header \\-->

		<!--// Main Content \\-->
		<div class="sportsmagazine-main-content sportsmagazine-main-contentminus">
            
            <!--// Main Section \\-->
            <div class="sportsmagazine-main-section sportsmagazine-thumb">
                <span class="thumb-transparent"></span>
                <div class="sportsmagazine-thumb-text">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                               <img src="images/Lebron-MJ.jpg">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <img align="CENTER" src="<?php echo $dados['noticiaImagemURL']?>" >
            <!--// Main Section \\-->

			<!--// Main Section \\-->
			<div class="sportsmagazine-main-section">
				<div class="container">
					<div class="row">
                        <div class="col-md-9">
                            <div class="sportsmagazine-rich-editor">
                                <blockquote> <h2> <?php echo $dados['noticiaCorpo'] ?> </h2>
                            </div>

                            </div>

                                             </div>






                              </div>
                              <!--// comment-respond \\-->
                           </div>

                        </div>
                        



                        </aside>
                        <!--// SideBar \\-->


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
        <!--// Footer \\-->

	<div class="clearfix"></div>
    </div>
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

