<?php

include 'bd.php';
include '../views/common/header.php';

if (!isset($_GET['asig'], $_GET['idprofe'])) {
    echo "error, no id asignatura";
} else {
    //echo $_GET['asig'].$_GET['idprofe'];
    $idprofe = $_GET['idprofe'];
    $idasig = $_GET['asig'];
    $_SESSION['id_profe'] = $idprofe;
    $_SESSION['id_asig'] = $idasig;
}

$c_asig_name = mysqli_query($conn, "SELECT * FROM Asignatura WHERE codigo = '$idasig'");

if (!$c_asig_name) {
    echo "no se pudo ejecutar la consulta";
} else {
    echo "";
}

while ($r = $c_asig_name->fetch_assoc()) {
    $nombre_asig = $r['nombre'];
}

echo "<div class='container'>
        <div class='row mt-4'>
            <div class='col-12 h3'> $nombre_asig</div>
        </div>";

//codigo para corregir algunas rutas
echo "<script>
                
                document.addEventListener('DOMContentLoaded', function() {
                  var src1 = document.getElementById('img_dep').src = '../views/common/imgs/departament.png';
                    var src2 = document.getElementById('img_ninios').src = '../views/common/imgs/niños-estudiando.jpg';
                    var src3 = document.getElementById('consll').src = '../views/common/imgs/logo_main.png';
                    var src4 = document.getElementById('moodl').src =  '../views/common/imgs/logo_moodle.png';
                    var src5 = document.getElementById('sonfe_text').href =  '../index.php';
                }) 
                    
                  </script>";


$q = mysqli_query($conn, "SELECT * FROM Deberes WHERE idprofe = '$idprofe' AND 
                                                             idGrupo = '$idasig'");

while ($r = $q->fetch_assoc()) {
    $titulo = $r['titulo'];
    $descripcion = $r['descripcion'];
    $fecha = $r['fecha'];
    $archivo = $r['archivo'];
    echo "<div class=\"card text-center mt-5 mb-5\">
  <div class=\"card-header\">
    TAREA
  </div>
  <div class=\"card-body\">
    <h5 class=\"card-title\">$titulo</h5>
    <p class=\"card-text\">$descripcion</p>
    <a href=\"#\" class=\"btn btn-primary\">$archivo</a>
    <form action='saveTarea.php' method='post' enctype=\"multipart/form-data\">
    <input type='file' name='file' id='file' class='btn btn-info'>
    <input type='submit' name='btn-guarda' value='guardar' class='btn btn-light border-info'>
    </form>
  </div>
  <div class=\"card-footer text-muted\">
    Actividad puesta: $fecha
  </div>
</div>";

}

?>

    </div>

<?php
include '../views/common/footer.php';
