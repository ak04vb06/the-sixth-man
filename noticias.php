<?php
    include_once("includes/body.inc.php");
    drawTop(NOTICIAS);
    global $con;
    $dataIniN="";
    $dataFimN="";
    $sql="select * from noticias";
    if(isset($_POST['dataIniN'])&&isset($_POST['dataFimN'])){
    $sql.=" where noticiaData between '".$_POST['dataIniN']."' and '".$_POST['dataFimN']."'";
    $dataIniN=$_POST['dataIniN'];
    $dataFimN=$_POST['dataFimN'];
}



$sql.=" order by noticiaData desc";

    $res=mysqli_query($con,$sql);

?>
    <link rel = "icon" type = "image/svg" href = "images/nba-logoman-75-word_white.svg">
<!--// MainSection \\-->
<div class="sportsmagazine-banner-one">
    <div class="sportsmagazine-banner-one-layer">
        <img src="images/bannerNoticias/StephCurryBanner.png " alt="">
        <span class="sportsmagazine-banner-pattren"></span>
        <div class="sportsmagazine-banner-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sportsmagazine-banner-wrap">
                            <h1><span>NOTÍCIAS DA NBA </span> <strong class="sportsmagazine-color">  </strong>  <span> </span>     </h1>
                            <p> </p>

                        </div>
                        <div  class="sportsmagazine-banner-thumb"> <img src="extra-images/ " alt="" >  </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="sportsmagazine-banner-one-layer">
        <img src="images/bannerNoticias/lillardBanner.png" alt="">
        <span class="sportsmagazine-banner-pattren"></span>
        <div class="sportsmagazine-banner-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sportsmagazine-banner-wrap">
                            <h1><span>NOTÍCIAS DA NBA </span> <strong class="sportsmagazine-color">  </strong>  <span> </span>     </h1>
                            <p> </p>

                        </div>
                        <div  class="sportsmagazine-banner-thumb"> <img src="extra-images/ " alt="" >  </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sportsmagazine-banner-one-layer">
        <img src="images/bannerNoticias/giannisAkumpoBanner.png" alt="">
        <span class="sportsmagazine-banner-pattren"></span>
        <div class="sportsmagazine-banner-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sportsmagazine-banner-wrap">
                            <h1><span>NOTÍCIAS DA NBA </span> <strong class="sportsmagazine-color">  </strong>  <span> </span>     </h1>
                            <p> </p>

                        </div>
                        <div  class="sportsmagazine-banner-thumb"> <img src="extra-images/ " alt="" >  </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


</div>



</header>
    <div class="sportsmagazine-main-content"></div>
    <div align="center" class="">
        <form action="" method="post">
            <tr >
                <td align="right">
                    <strong>  Filtro: </strong>
                </td>
                <td colspan="2">
                    <b> Data início</b>  <input type="date" name="dataIniN" value="<?php echo $dataIniN;?>">
                </td>
                <td colspan="2">
                    <b>Data Fim</b>  <input type="date" name="dataFimN" value="<?php echo $dataFimN;?>">
                </td>
                <td>
                    <input type="submit" value="Aplicar">
                </td>

            </tr>
        </form>
    </div>



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
                                        <figure><a  href="blog-detail.php?id=<?php echo  $dados['noticiaId']?>"><img src="<?php echo $dados['noticiaImagemURL'] ?>" alt="" ></a></figure>
                                        <div class="sportsmagazine-bloglarge-text">
                                            <time datetime="2008-02-14 20:00"><?php echo strftime('%A, %d de %B de %Y', strtotime($dados['noticiaData'])); ?></time>
                                            <h3><a href="blog-detail.php?id=<?php echo $dados['noticiaId']?>"><?php echo $dados['noticiaTitulo']?></a></h3>
                                            <p></p>
                                            <a  href="blog-detail.php?id=<?php echo $dados['noticiaId']?>" >  </a>
                                            <p></p>
                                            <a  href="blog-detail.php?id=<?php echo $dados['noticiaId']?>"> <i class="fa fa-arrow-circle-o-right"> Read More </i>
                                        </div>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                </ul>

                            </div>




                        </div>




					</div>

				</div>
			</div>




		</div>

<?php
    drawBottom();
?>