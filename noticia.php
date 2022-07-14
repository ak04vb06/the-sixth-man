<?php
    include_once("includes/body.inc.php");
    drawTop(NOTICIAS);
    global $con;
    $id=intval($_GET['id']);
    $sql="select * from noticias where noticiaId=$id";
    $res=mysqli_query($con,$sql);
    $dados=mysqli_fetch_array($res);
?>
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
                        <img style="width:1070px; height:400px" src="<?php echo $dados['noticiaImagemURL']?>">

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--// Main Section \\-->
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

                                    <li class="col-md-12">
                                        <div class="sportsmagazine-bloglarge-text">
                                            <time datetime="2008-02-14 20:00"><?php echo strftime('%A, %d de %B de %Y', strtotime($dados['noticiaData'])); ?></time>
                                            <h3><a href="blog-detail.php?id=<?php echo $dados['noticiaId']?>"><?php echo $dados['noticiaTitulo']?></a></h3>
                                            <p></p>
                                            <a  href="blog-detail.php?id=<?php echo $dados['noticiaId']?>" ><?php echo $dados['noticiaResumo']?>  </a>

                                           <?php echo $dados['noticiaCorpo']?>


                                        </div>
                                    </li>

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