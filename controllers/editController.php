<?php

include('bd.php');
include('../views/common/header.php');

if (isset($_GET['id'])) {// Validacion usuario a editar
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
if ($idTipoUsuario == 2) {
    setcookie("esAlumno", true);
    $consulta = mysqli_query($conn, "SELECT * FROM Alumno WHERE nombre = '$nombre' 
                                            AND  apellidos  = '$apellidos'");

    while ($raw = $consulta->fetch_assoc()) {
        $fnac = $raw['anyoNacimiento'];
        $numExp = $raw['nExp'];
    }

} else {
    setcookie("esAlumno", false);
}
if (isset($_POST['actualizar'])) {
    $id = $_GET['id'];
    $newName = $_POST['nombre'];
    $newApellidos = $_POST['apellidos'];
    $newUsuario = $_POST['usuario'];
    $newContrasenya = $_POST['contrasenya'];
    $newIdTipoUsuario = $_POST['idTipoUsuario'];
    $newIdCurso = $_POST['idCurso'];
    $queryActualiza = mysqli_query($conn, "UPDATE Personal set
      nombre = '$newName',
       apellidos =  '$newApellidos',
        usuario = '$newUsuario',
         contrasenya = '$newContrasenya',
          idTipoUsuario =  '$newIdTipoUsuario',
           idCurso = '$newIdCurso'
            WHERE id = $id");
    if (!$queryActualiza) {
        echo "Something went wrong on query";
    }
    echo $newApellidos . $newName . $newUsuario . $newContrasenya . $newIdTipoUsuario . $newIdCurso;
    header("Refresh:0; url=admin.php");
}

?>
<form class='' action="editController.php?id=<?php echo $_GET['id']; ?>" method='POST'>
    <?php
    echo "<label>Personal Id: <input type='text' name='id' class='id' value=$id></label><br>";
    echo "<label>Nombre: <input type='text' name='nombre' class='nombre' value=$nombre></label><br>";
    echo "<label>Apellidos: <input type='text' name='apellidos' class='apellidos' value='$apellidos'></label><br>";
    echo "<label>Nick/Usuario: <input type='text' name='usuario' class='usuario' value=$usuario></label><br>";
    echo "<label>Contraseña: <input type='text' name='contrasenya' class='contrasenya' value=$contrasenya></label><br>";
    if ($idTipoUsuario == 2) {
        echo "<label><mark>Fecha Nacimiento:</mark> <input hidden type='date' name='fnac' id='fnac' value='$fnac'></label><br>";
        echo "<label><mark>Num Expe: </mark><input hidden type='text' name='numExpe' id='numExp' value='$numExp'></label><br>";
    }else{

    }
    echo "<label>Tipo usuario id:<input type='text' name='idTipoUsuario' class='idTipoUsuario' value=$idTipoUsuario></label><br>";
    echo "<label>Curso id: <input type='text' name='idCurso' class='idCurso' value=$idCurso></label><br>
  <button type='submit' name='actualizar' class='btn btn-info'>save</button>
  </form>";

    }
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