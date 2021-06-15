<?php
include "../controllers/bd.php";
include "common/header.php";

$idcurso = $_SESSION['idCurso'];
$c_profe = $_SESSION['profeLoged'];
$idprofe = $_SESSION['idpr'];

//Todas las asignaturas que imparte un profesor
$q_asignatura = mysqli_query($conn, "SELECT * FROM Asignatura WHERE idProfe = '$idprofe'");
echo "
<div class='container'>
<div class='row text-center'>
<div class='col-12 h3'>Selecciona curso</div>
</div>
</div>
<form action='../controllers/faltas.php' method='post'>
<select name='selectable'>
<option value='none'></option>";
while ($r = $q_asignatura->fetch_assoc()){
    $codigo = $r['codigo'];
    $nombre = $r['nombre'];
    $id_g = $r['idGrupo'];
    echo "<option value='$id_g'>Curso:$nombre, Grupo:$id_g</option>";
}
echo"
</select>
<input type='submit' name='btn_seleccion' value='pasar lista' class='btn btn-info'></form>"
?>

<?php
include "common/footer.php";
?>