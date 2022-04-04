<?php
    include_once ("config.php");
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
        .nav-pills{
            padding:3px;}
        .nav-pills .nav-link.active, .nav-link {
            color: #fFF;

        }
        .nav-link:hover{
            color:#999;
        }

    </style>
    <title>Backoffice</title>
</head>
<body>


<div class="container">

    <nav class="nav nav-pills nav-fill bg-dark ">
        <img src="../images/nba-logoman-75-word_white.svg" height="46">
        <a class="nav-link "  href="listaClubes.php">Clubes</a>
        <a class="nav-link" href="#">Much longer nav link</a>
        <a class="nav-link" href="#">Link</a>
        <a class="nav-link disabled">Disabled</a>
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
