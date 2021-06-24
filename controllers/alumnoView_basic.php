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
            <div class='col-4 h4' >
    <div class=' pt-2 pb-2 pl-2'   style='background-color: #4E006D;color: aliceblue'>Hola, ".$_SESSION['nombre']."</div>
            </div>
            <div class='col-8 mt-5 mb-5'>
                <div class='h5 mb-5 border-bottom pt-2 pb-2 pl-2' style='background-color: #4E006D;color: aliceblue'>Tus asignaturas</div>
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
        $cod_asig = $r['codigo'];
        $asignatura = $r['nombre'];
        $idProfe = $r['idProfe'];
        $q_profe = mysqli_query($conn, "SELECT * FROM Profesor WHERE id = '$idProfe'");
        while ($rs = $q_profe->fetch_assoc()){
            $idpers = $rs['idPersonal'];
        }
        $q_name = mysqli_query($conn, "SELECT * FROM Personal WHERE id = '$idpers'");
        while ($w = $q_name->fetch_assoc()){
            $name_profe = $w['nombre'];
            $apellido = $w['apellidos'];
        }

        echo '
<div class="col-md-4">
<a href="entrega_deberes.php?asig='.$cod_asig.'&idprofe='.$idProfe.'"><div class="card mb-4" onmouseover="movement(this)" onmouseleave="dismov(this)" ">
                  <div class="card-header h6">
                    ' . $asignatura . '
                  </div>
                  <div class="card-body">
                      <blockquote class="blockquote mb-0">
                      <p></p>
                      <footer class="blockquote-footer"> <cite title="Source Title">'.$name_profe.' '.$apellido.'</cite></footer>
                      </blockquote>
                   </div>
               </div></a> </div>';
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
