<?php
include "bd.php";
include "../views/common/header.php";

$ndate = date('Y-m-d H:i:s');

if (!isset($_SESSION['logged'])){
    session_start();
    $_SESSION['logged'];
}

if (isset($_POST['btn-faltas'])){
    if (empty($_POST['retraso']) && empty($_POST['asistencia'])){
        echo "<script>alert('No ha falta ningún alumno')</script>";
        echo "<script>alert('Guardado satisfactoriamente')</script>";
        header("Refresh:0;url=profeView_basic.php");

    }
    if (!empty($_POST['retraso'])){
        foreach ($_POST['retraso'] as $val){
            $val_r  = (int)$val;
            $q_asis = mysqli_query($conn, "INSERT INTO Asistencia (fecha, idAlumno, falta, retardo)
                                               VALUES('$ndate','$val_r', 0,1)");
        }
        header("Refresh:0;url=profeView_basic.php");
        echo "<script>alert('Guardado satisfactoriamente')</script>";
    }
        if (!empty(($_POST['asistencia']))){
        foreach ($_POST['asistencia'] as $item) {
            $item_a  = (int)$item;
            $q_ret = mysqli_query($conn, "INSERT INTO Asistencia (fecha, idAlumno, falta, retardo)
                                               VALUES('$ndate', '$item_a', 1, 0)");
        }
            header("Refresh:0;url=profeView_basic.php");
            echo "<script>alert('Guardado satisfactoriamente')</script>";
    }

}//save who is missin

$idcurso = $_SESSION['idCurso'];
if (isset($_POST['btn_seleccion'])) {
    $idcurso_notutor = $_POST['selectable'];
    $_SESSION['selectable'] = $_POST['selectable'];
}

$q  = mysqli_query($conn, "SELECT * FROM Personal WHERE 
                                        idTipoUsuario = 2  AND idCurso = '$idcurso_notutor'");
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


echo "<form method='post' action='faltas.php'>
 <table class='table table-stribed'><thead>
    <th>id</th>
    <th>nombre</th>
    <th>apellido</th>
    <th>Retraso</th>
    <th>Asistencia</th>
</thead>
<tbody>";
while ($r = $q->fetch_assoc()) {
    $name = $r['nombre'];
    $apellidos = $r['apellidos'];
    $id = $r['id'];
    $nid = $id-100;
    echo "<tr name='trId[]' id='$nid'>
        <td>$nid</td>
        <td>$name</td>
        <td>$apellidos</td>
        <td><input type='checkbox' name='retraso[]' value=$nid></td>
        <td><input type='checkbox' name='asistencia[]' value=$nid></td>
        
</tr>";
}

?>
    </tbody></table>
    <input type="submit" name="btn-faltas" class="btn btn-info ml-3" value="guarda">
    </form>




<?php
include "../views/common/footer.php"
?>