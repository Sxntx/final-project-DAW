<?php
include '../views/common/header.php';
include "../controllers/bd.php";


if ($_SESSION['selectable']){
    $idcurso_ses  = $_SESSION['selectable'];
}

?>
<div class="container">
    <div class="row text-center">
        <div class="col-12 h3"> Curso id <?php echo  $_SESSION['selectable'] ?></div>
    </div>
</div>

<div class="container">
    <div class="row text-center">
        <div class="col-12"></div>
    </div>
</div>

<?php

include "../views/common/footer.php";
?>