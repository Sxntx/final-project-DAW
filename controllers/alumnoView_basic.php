<?php
include 'bd.php';

include '../views/common/header.php';


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

echo "<div class='container mt-3'>
        <div class='row'>
            <div class='col-4 h4'>
    Hola, ".$_SESSION['nombre']."
            </div>
            <div class='col-8 mt-5 mb-5'>
                <div class='h5 mb-5 border-bottom'>Tus asignaturas</div>
                <div class='row'>
                ";
$idCurso = $_SESSION['idCurso'];
$q = mysqli_query($conn, "SELECT * FROM Asignatura WHERE idGrupo = '$idCurso'");

while ($r = $q->fetch_assoc()){
    $cont = 0;
    $cont;
    $cont++;
    if ($cont % 2 == 0){
            echo '</div><div class="row">';
    }else {
        $asignatura = $r['nombre'];
        echo '
<div class="col-md-4">
<div class="card mb-2">
                  <div class="card-header">
                    ' . $asignatura . '
                  </div>
                  <div class="card-body">
                      <blockquote class="blockquote mb-0">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                      <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                      </blockquote>
                   </div>
               </div> </div>';
    }

}
echo "
                </div>
                    </div>
                </div>
                </div>";

?>




<?php
include '../views/common/footer.php';
