<?php
include '../views/common/header.php';
include "../controllers/bd.php";

$idcurso = (int)$_SESSION['idCurso'];
$idprofe = (int)$_SESSION['idpr'];

if ($_SESSION['selectable']) {
    $idcurso_ses = $_SESSION['selectable'];
}

?>
<script>
    function oculta(e) {
    e.parentNode.parentNode.style.display = 'none';
    }
</script>
    <div class="container">
        <div class="row text-center">
            <div class="col-12 h5 mt-3"> Curso id <?php echo $_SESSION['selectable'] ?></div>
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
                    <input class="form-control form-control-sm" name="file" id="file" type="file"/><br>
                    <input type="submit" name="btn-file" class="btn btn-info">
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <?php
                $qi = mysqli_query($conn, "SELECT * FROM Asignatura WHERE idGrupo = '$idcurso' AND
idProfe = '$idprofe'");

                while ($rw = $qi->fetch_assoc()){
                    $codigo = $rw['codigo'];
                }

                $db_deberes = mysqli_query($conn, "SELECT * FROM Deberes WHERE idprofe = '$idprofe'
AND idGrupo = '$codigo'");
                if (!$db_deberes) {
                    echo "error consultando bd";
                } else {
                    while ($row = $db_deberes->fetch_assoc()) {
                        $id = $row['id'];
                        $titulo = $row['titulo'];
                        $descrip = $row['descripcion'];
                        $fecha = $row['fecha'];
                        $archivo = $row['archivo'];

                        echo "<div class=\"card text-center\">
  <div class=\"card-header\">
    <p class='float-left h5'>Tarea</p>
    <a href='../controllers/editTarea.php?id=$id' class='btn btn-warning btn-sm float-right'>Editar</a>
    <a class='btn btn-info btn-sm float-right' onclick='oculta(this)'>Ocultar</a>
    <a href='../controllers/deleteTarea.php?id=$id' class='btn-sm btn btn-danger float-right'>Elimina</a>
  </div>
  <div class=\"card-body\">
    <h5 class=\"card-title\">$titulo</h5>
    <p class=\"card-text\">$descrip</p>
    <a href=\"#\" class=\"btn btn-primary\">$archivo</a>
  </div>
  <div class=\"card-footer text-muted\">
    $fecha
  </div>
</div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

<?php

include "../views/common/footer.php";
?>