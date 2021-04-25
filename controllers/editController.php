<?php

include('bd.php');
include('../views/common/header.php');

if (isset($_GET['id'])) {// Validacion usuario a editar
  $id = $_GET['id'];
  $query = mysqli_query($conn,  "SELECT * FROM Personal WHERE id = '$id'");
  while($row = $query->fetch_assoc()){
    $id=$row['id'];
    $nombre=$row['nombre'];
    $apellidos=$row['apellidos'];
    $usuario=$row['usuario'];
    $contrasenya=$row['contrasenya'];
    $idTipoUsuario=$row['idTipoUsuario'];
    $idCurso=$row['idCurso'];
  }

  if (isset($_POST['actualizar'])) {
    $id = $_GET['id'];
    $newName = $_POST['nombre'];
    $newApellidos = $_POST['apellidos'];
    $newUsuario = $_POST['usuario'];
    $newContrasenya = $_POST['contrasenya'];
    $newIdTipoUsuario = $_POST['idTipoUsuario'];
    $newIdCurso = $_POST['idCurso'];
    $queryActualiza = mysqli_query($conn,"UPDATE Personal set
      nombre = '$newName',
       apellidos =  '$newApellidos',
        usuario = '$newUsuario',
         contrasenya = '$newContrasenya',
          idTipoUsuario =  '$newIdTipoUsuario',
           idCurso = '$newIdCurso'
            WHERE id = $id");
            if (!$queryActualiza){
              echo "Something went wrong on query";
            }
            echo $newApellidos.$newName.$newUsuario.$newContrasenya.$newIdTipoUsuario.$newIdCurso;
            header("Refresh:0; url=admin.php");
  }

  ?>
  <form class='' action="editController.php?id=<?php echo $_GET['id']; ?>"  method='POST'>
  <?php
  echo "<input type='text' name='id' class='id' value=$id><br>";
  echo "<input type='text' name='nombre' class='nombre' value=$nombre><br>";
  echo "<input type='text' name='apellidos' class='apellidos' value='$apellidos'><br>";
  echo "<input type='text' name='usuario' class='usuario' value=$usuario><br>";
  echo "<input type='text' name='contrasenya' class='contrasenya' value=$contrasenya><br>";
  echo "<input type='text' name='idTipoUsuario' class='idTipoUsuario' value=$idTipoUsuario><br>";
  echo "<input type='text' name='idCurso' class='idCurso' value=$idCurso>
  <button type='submit' name='actualizar' class='btn btn-info'>save</button>
  </form>";

}
?>
