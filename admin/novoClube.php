<?php

include_once ("includes/body.inc.php");
global $con;
top();


?>
<div class="container form ">

    <h1>Novo Clube</h1>
    <form action="confirmaNovoClube.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="clube" class="form-label">Nome do clube</label>
            <input type="text" class="form-control" id="clube" name="clubeNome">
        </div>
        <div class="mb-3">
            <label for="clube" class="form-label">Sobrenome do clube</label>
            <input type="text" class="form-control" id="clube" name="clubeSobrenome">
        </div>
        <div class="mb-3">
            <label for="clube" class="form-label">Conferência</label>
        </div>
        <div class="mb-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="clubeConferencia" id="clubeConferencia" checked value="west">
                <label class="form-check-label" for="inlineRadio1">Conferência de Oeste</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="clubeConferencia" id="clubeConferencia2" value="east">
                <label class="form-check-label" for="inlineRadio2">Conferência de Este</label>
            </div>

        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Logótipo</label>
            <input class="form-control" type="file" id="logo" name="logo">
        </div>
        <div class="mb-3 text-end">
            <input type="submit" class="btn-sm btn-primary" value="Confirma">
        </div>
    </form>





</div>
<?php
bottom();
?>
