<?php
    include_once ("config.inc.php");
    $con=mysqli_connect(HOST,USER, PWD,DATABASE);
    function top(){
        ?>
    <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body{
            background-color: #e9e9e9;
        }
        .nav-pills{
            padding:3px;}
        .nav-pills .nav-link.active, .nav-link {
            color: #fFF;

        }
        .nav-link:hover{
            color:#999;
        }
        th{
            text-align: center;
        }
       .container{
            border-left: solid thin #888;
            border-bottom: solid thin #ccc;
            border-right: solid thin #ccc;
        }
        .form-check-input:checked {
            background-color: rgba(100, 100, 100, 0.9);
            border-color: #101140;
        }
    </style>
    <title>Backoffice</title>
</head>
<body>


<div class="container bg-dark">
    <h1 style="text-align: center; color: whitesmoke">Administração - base de dados</h1>

    <nav class="nav nav-pills nav-fill bg-dark ">
        <img src="../images/nba-logoman-75-word_white.svg" height="46">

        <a class="nav-link "  href="listaClubes.php">Clubes</a>
        <a class="nav-link" href="listaResultados.php">Resultados</a>
        <a class="nav-link" href="listaNoticias.php">Notícias</a>
    </nav>
</div>


<?php
    }
    function bottom(){
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        </body>
        </html>

        <?php
    }
    ?>
