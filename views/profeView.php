<?php
include "../controllers/bd.php";
include "common/header.php";

$idcurso = $_SESSION['idCurso'];
$c_profe = $_SESSION['profeLoged'];
?>
    <div class="conatiner">
        <div class="col">
            <a href="../controllers/faltas.php">Pasar lista</a>

        </div>
    </div>

<?php
include "common/footer.php";
?>