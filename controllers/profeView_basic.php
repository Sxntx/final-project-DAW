<?php
include "bd.php";
include "../views/common/header.php";

$idcurso = (int)$_SESSION['idCurso'];
$idprofe = (int)$_SESSION['idpr'];

if ($_SESSION['selectable']) {
    $idcurso_ses = $_SESSION['selectable'];
}

//Codigo para corregir error de rutas imgs
echo "<script>
                
                document.addEventListener('DOMContentLoaded', function() {
                  var src1 = document.getElementById('img_dep').src = '../views/common/imgs/departament.png';
                    var src2 = document.getElementById('img_ninios').src = '../views/common/imgs/niños-estudiando.jpg';
                    var src3 = document.getElementById('consll').src = '../views/common/imgs/logo_main.png';
                    var src4 = document.getElementById('moodl').src =  '../views/common/imgs/logo_moodle.png';
                    var src5 = document.getElementById('sonfe_text').href =  '../index.php';
                }) 
                    
                  </script>";

?>

<style>
    .ocultar{
        display: none;
    }
    .mostrar{
        display: block;
    }
</style>
<script>
    function again() {
        var ocultos = document.getElementsByClassName('ocultar');
        for (const oculto of ocultos) {
            oculto.classList.remove('ocultar');
            oculto.classList = 'card text-center mb-3';
        }
    document.getElementById('btn_mnuevo').remove();


    }
    function oculta(e) {
        var tarea = e.parentNode.parentNode;
        if (tarea.className != 'ocultar'){
            tarea.className =  'ocultar';
            var btn = document.createElement('button');
            var txt = document.createTextNode('mostrar de nuevo');
            btn.setAttribute('id',  'btn_mnuevo');
            btn.setAttribute('onclick', 'again()');
            btn.appendChild(txt);

            tarea.parentNode.append(btn);
        }
    }
</script>
    <div class="container">
        <div class="row text-center">
            <div class="col-12 h5 mt-3"> Curso id actual <?php echo $_SESSION['selectable'] ?></div>
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

                        echo "<div class=\"card text-center mb-3\">
  <div class=\"card-header\">
    <p class='float-left h5'>Tarea</p>
    <a href='../controllers/editTarea.php?id=$id' class='btn btn-warning btn-sm float-right'>Editar</a>
    <a class='btn btn-info btn-sm float-right' onclick='oculta(this)'>Ocultar</a>
    <a href='../controllers/deleteTarea.php?id=$id' class='btn-sm btn btn-danger float-right'>Elimina</a>
  </div>
  <div class=\"card-body\">
    <h5 class=\"card-title\">$titulo</h5>
    <p class=\"card-text\">$descrip</p>
    <a href=\"../controllers/archivos_profes/$archivo\" class=\"btn btn-primary\">$archivo</a>
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