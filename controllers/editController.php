<?php

include('bd.php');
include('../views/common/header.php');

if (isset($_GET['id'])) {//get id from Personal to update
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM Personal WHERE id = '$id'");
    while ($row = $query->fetch_assoc()) {
        $id = $row['id'];
        $nombre = $row['nombre'];
        $apellidos = $row['apellidos'];
        $usuario = $row['usuario'];
        $contrasenya = $row['contrasenya'];
        $idTipoUsuario = $row['idTipoUsuario'];
        $idCurso = $row['idCurso'];
    }
    if ($idTipoUsuario == 2) {//if is alumno get DOB and nExp
        setcookie("esAlumno", true);
        $consulta = mysqli_query($conn,
            "SELECT * FROM Alumno WHERE nombre = '$nombre' AND  apellidos  = '$apellidos'");
        while ($raw = $consulta->fetch_assoc()) {
            $fnac = $raw['anyoNacimiento'];//to show DOB input
            $numExp = $raw['nExp'];//to show nExp input
        }
    } else {
        setcookie("esAlumno", false);
    }
    if ($idTipoUsuario == 1){
        setcookie("esProfesor", true);
        $email_tel = mysqli_query($conn,
            "SELECT * FROM Profesor WHERE idPersonal = '$id'");
        while ($r = $email_tel->fetch_assoc()) {
            $db_email = $r['Email'];
            $db_tel = $r['Telefono'];
        }
    }else{
        setcookie("esProfesor", false);
    }

}

if (isset($_POST['actualizar'])) {// Update personal table
    $id = $_GET['id'];
    $selecPersonal = mysqli_query($conn, "SELECT * FROM Personal WHERE id = '$id'");//set to change data if tipeuser
    while ($rw = $selecPersonal->fetch_assoc()) {
        $id_user_type = $rw['idTipoUsuario'];

    }
    if ($id_user_type == 2) {//alumno
        $n_alumn_name = $_POST['nombre'];
        $n_alumn_lastname = $_POST['apellidos'];
        $n_alumn_user = $_POST['usuario'];
        $n_alumn_pass = $_POST['contrasenya'];
        $n_alumn_newDOB = $_POST['fnac'];
        $n_alumn_userType = $_POST['idTipoUsuario'];
        $n_alumn_idCurs = $_POST['idCurso'];
        $n_alumn_nExp = $_POST['numExpe'];
        $updt_personal_tbl = mysqli_query($conn,//OK
            "UPDATE Personal set nombre = '$n_alumn_name', apellidos = '$n_alumn_lastname',
                                usuario = '$n_alumn_user', contrasenya = '$n_alumn_pass',
                                idTipoUsuario = '$n_alumn_userType', idCurso = '$n_alumn_idCurs'
            WHERE id = '$id'");
        $updt_alumn_tbl = mysqli_query($conn,//OK
            "UPDATE Alumno set nombre = '$n_alumn_name', apellidos = '$n_alumn_lastname',
                              anyoNacimiento = '$n_alumn_newDOB'
            WHERE nExp = '$numExp'");

        if (!$updt_alumn_tbl){
            echo "Fallo en insert alumn";
        }elseif (!$updt_personal_tbl){
            echo "Fallo personal table".$id;
        }else
            header("Refresh:0; url=admin.php");
    }

    if ($id_user_type == 1) {//profe
        $n_profe_name = $_POST['nombre'];
        $n_profe_lastname = $_POST['apellidos'];
        $n_profe_user = $_POST['usuario'];
        $n_profe_pass = $_POST['contrasenya'];
        $n_profe_userType = $_POST['idTipoUsuario'];
        $n_profe_idCurs = $_POST['idCurso'];
        $n_profe_email = $_POST['pemail'];
        $n_profe_tel = $_POST['ptel'];

        $other = $id  - 108;//idPersonal - 108 get id Profesor  OK DONE
        $updt_one = mysqli_query($conn, "UPDATE Grupo set idProfesor = '$other'
                                                            WHERE id = '$n_profe_idCurs'");

    /*Not add functionality of chagin viceverse id's
    Profeid = 0 -> groupId =0 to groupId = 1 where profeId = 4 then
    Profeid = 4 to groupId =0; avoid because maybe we want to change profe Id from groupId, but we wont
    viceversa change ... this give us more adaptability
    */

        $updt_personalPro_tbl = mysqli_query($conn,//OK
            "UPDATE Personal set nombre = '$n_profe_name', apellidos = '$n_profe_lastname',
                                usuario = '$n_profe_user', contrasenya = '$n_profe_pass',
                                idTipoUsuario = '$n_profe_userType', idCurso = '$n_profe_idCurs'
            WHERE id = '$id'");

        $updt_profe_tbl = mysqli_query($conn,
            "UPDATE Profesor set Email = '$n_profe_email', Telefono = '$n_profe_tel'
            WHERE idPersonal = '$id'");

        if (!$updt_personalPro_tbl){
            echo "Error updating personal table";
        }elseif (!$updt_profe_tbl){
            echo "Error updating profesor table";
        }else
            header("Refresh:0;url=admin.php");

    }

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
<div class="container text-center mt-5 mb-5">
    <div class="row mb-3">
        <div class="col-12 h3">
                Edita personal
        </div>
    </div>
<form class='' action="editController.php?id=<?php echo $_GET['id']; ?>" method='POST'>
    <?php
    echo "<label>Personal Id: <input type='text' name='id' class='id' value=$id></label><br>
    <label>Nombre: <input type='text' name='nombre' class='nombre' value=$nombre></label><br>
    <label>Apellidos: <input type='text' name='apellidos' class='apellidos' value=$apellidos></label><br>
    <label>Nick/Usuario: <input type='text' name='usuario' class='usuario' value=$usuario></label><br>
    <label>Contraseña: <input type='text' name='contrasenya' class='contrasenya' value=$contrasenya></label><br>";
    if ($idTipoUsuario == 2) {
        echo "<label><mark>Fecha Nacimiento:</mark> <input hidden type='date' name='fnac' id='fnac' value='$fnac'></label><br>
        <label><mark>Num Expe: </mark><input hidden type='text' name='numExpe' id='numExp' value='$numExp'></label><br>";
    } elseif ($idTipoUsuario == 1) {
        echo "<label>Email:<input type='email' name='pemail' id='pemail' value='$db_email'></label><br>
              <label>Telefono:<input type='tel' name='ptel' id='ptel' value='$db_tel'></label><br>";
    }
    echo "<label>Tipo usuario id:<input type='text' name='idTipoUsuario' class='idTipoUsuario' value=$idTipoUsuario></label><br
    <label>Curso id: <input type='text' name='idCurso' class='idCurso' value=$idCurso></label><br>
  <button type='submit' name='actualizar' class='btn btn-info mt-3 '>save</button>
  </form>
  </div>
  ";


    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var x = document.cookie;
            if (x) {
                document.getElementById('fnac').removeAttribute('hidden');
                document.getElementById('numExp').removeAttribute('hidden');
            } else {
                document.getElementById('fnac').setAttribute('hidden', true);
                document.getElementById('numExp').setAttribute('hidden', true);
            }
        })

    </script>

    <?php
include '../views/common/footer.php';