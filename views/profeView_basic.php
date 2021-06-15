<?php
include '../views/common/header.php';
include "../controllers/bd.php";

if ($_SESSION['selectable']){
    $idcurso_ses  = $_SESSION['selectable'];
}

?>
<div class="container">
    <div class="row text-center">
        <div class="col-12 h5 mt-3"> Curso id <?php echo  $_SESSION['selectable'] ?></div>
    </div>
</div>

<div class="container">
    <div class="row text-center h3">
        <div class="col-12">
            Nueva entrada
        </div>
    </div>
    <div class="row text-center">
        <div class="col-12">
            <form class="" action="../controllers/filesController.php" method="post" enctype="multipart/form-data">
                <label for="formFileSm" class="form-label">Título</label><br>
                <input type="text" name="titulo" id="titulo" placeholder="Titulo"><br><br>
                <label for="formFileSm" class="form-label">Describe la tarea</label><br>
                <textarea name="textarea" id="textarea" cols="30" rows="5" placeholder="nuevo contenido"></textarea><br><br>
                <label for="formFileSm" class="form-label">Escoge tu archivo</label>
                <input class="form-control form-control-sm" name="file" id="file" type="file" /><br>
                <input type="submit" name="btn-file" class="btn btn-info">
            </form>
        </div>
    </div>
</div>

<?php

include "../views/common/footer.php";
?>