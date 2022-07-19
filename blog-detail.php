<?php
    include_once("includes/body.inc.php");
    drawTop(NOTICIAS);
    global $con;
    $id=intval($_GET['id']);
    $sql="select *  from noticias where noticiaId=$id ";
    $res=mysqli_query($con,$sql);
    $dados=mysqli_fetch_array($res);

?>
<link rel = "icon" type = "image/svg" href = "images/nba-logoman-75-word_white.svg">
  <body>
	
    <!--// Main Wrapper \\-->
    <div class="sportsmagazine-main-wrapper">

        <!--// Header \\-->
        <header id="sportsmagazine-header" class="sportsmagazine-header-one">



            <!--// MainSection \\-->

        </header>
        <!--// Header \\-->
            <br>
		<!--// Main Content \\-->
		<div class="sportsmagazine-main-content sportsmagazine-main-contentminus">
            
            <!--// Main Section \\-->


            <!--// Main Section \\-->

			<!--// Main Section \\-->
			<div class="sportsmagazine-main-section">
				<div class="container">
					<div class="row">
                        <?php


                        ?>
                        <div class="col-md-9">
                            <div class="sportsmagazine-rich-editor">
                                <figure>      <img  src="<?php echo $dados['noticiaImagemURL'] ?> " >   </figure>
                                <blockquote>  <?php echo $dados['noticiaCorpo'] ?>
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
<?php
drawBottom();
?>
