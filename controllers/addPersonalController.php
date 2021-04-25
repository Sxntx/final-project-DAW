<?php include('../views/common/header.php');
include('bd.php');

if(isset($_POST['guardar'])){
  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $usuario = $_POST['usuario'];
  $contrasenya = $_POST['contrasenya'];
  $idTipoUsuario = $_POST['idTipoUsuario'];
  $idCurso = $_POST['idCurso'];
  $query = mysqli_query($conn, "INSERT INTO Personal(nombre,apellidos,usuario,contrasenya,idTipoUsuario,idCurso)
  VALUES ('$nombre', '$apellidos', '$usuario', '$contrasenya', '$idTipoUsuario', '$idCurso') ");

  if(!$query){
    echo "Couldnt save, query wrong";
  }else{
    header('Refresh:0;  url=admin.php');
  }
}


?>

<form class="" action="addPersonalController.php" method="post">
  Nombre: <input type="text" name="nombre" value=""><br>
  Apellidos:<input type="text" name="apellidos" value=""><br>
  Nick:<input type="text" name="usuario" value=""><br>
  Pass:<input type="text" name="contrasenya" value=""><br>
  Tipo usuario:<input type="text" name="idTipoUsuario" value=""><br>
  idCurso:<input type="text" name="idCurso" value=""><br>
  <button type="submit" name="guardar" class="btn btn-success">Save</button>
</form>
