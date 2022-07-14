<?php
    include_once("includes/body.inc.php");
    drawTop(NOTICIAS);
    global $con;
    $id=intval($_GET['id']);
    $sql="select * from noticias where noticiaId=$id";
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
                                        <a  href="blog-detail.php?id=<?php echo $dados['noticiaId']?>"><img size src="<?php echo $dados['noticiaImagemURL']?>" alt="" ></a>
                                        <div class="sportsmagazine-bloglarge-text">
                                            <time datetime="2008-02-14 20:00"><?php echo strftime('%A, %d de %B de %Y', strtotime($dados['noticiaData'])); ?></time>
                                            <h3><a href="blog-detail.php?id=<?php echo $dados['noticiaId']?>"><?php echo $dados['noticiaTitulo']?></a></h3>
                                            <p></p>
                                            <a  href="blog-detail.php?id=<?php echo $dados['noticiaId']?>" ><?php echo $dados['noticiaResumo']?>  </a>

                                           <?php echo $dados['noticiaCorpo']?>


                                        </div>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>

                        </div>
                        
                        <!--// SideBar \\-->

					</div>
				</div>
			</div>


		</div>
		<!--// Main Content \\-->
<?php
    drawBottom();
?>