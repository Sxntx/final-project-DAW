<?php
include "../controllers/bd.php";
include "common/header.php";

$idcurso = $_SESSION['idCurso'];
$c_profe = $_SESSION['profeLoged'];
$idprofe = $_SESSION['idpr'];

//Todas las asignaturas que imparte un profesor
$q_asignatura = mysqli_query($conn, "SELECT * FROM Asignatura WHERE idProfe = '$idprofe'");
echo "
<div class='container mt-3 mb-5'>
<div class='row'>
<div class='col-6'>

</div>
</div>
<div class='row text-center mb-5'>
<div class='col-12 h3'>Selecciona curso</div>
</div>
<div class='text-center'>
<form action='../controllers/faltas.php' method='post'>
<select name='selectable' class='mb-3'>
<option value='none'></option>";
while ($r = $q_asignatura->fetch_assoc()){
    $codigo = $r['codigo'];
    $nombre = $r['nombre'];
    $id_g = $r['idGrupo'];
    echo "<option value='$id_g'>Curso:$nombre, Grupo:$id_g</option>";
}
echo"
</select><br>
<input type='submit' name='btn_seleccion' value='pasar lista' class='btn btn-info'>
</form>
</div>
</div>
";
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

<?php
include "common/footer.php";
?>