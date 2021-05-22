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

  if ($idTipoUsuario == 1) {
    
  }

  if(!$query){
    echo $nombre.' '.$apellidos.' '.$usuario.' '.$contrasenya.' '.$idTipoUsuario.' '. $idCurso;
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
  Pass:<input type="password" name="contrasenya" value=""><br>
  Confirm Pass:<input type="password" name="contrasenya" value=""><br>
  Tipo usuario:<input type="number"  min="0" max="2" name="idTipoUsuario" value="">  <i><small>0 admin, 1 profesor, 2 alumnno</small></i><br>
  idCurso:<input type="number" min="-1" max="13" name="idCurso" value=""><br>
  <ul>
    <li><i><small>-1 Sin curso</small></i></li>
    <li><i><small>0 1r GM SMX</small></i></li>
    <li><i><small>1 2n GM SMX</small></i></li>
    <li><i><small>2 1r GS DAW</small></i></li>
    <li><i><small>3 2n GS DAW</small></i></li>
    <li><i><small>4 1r ESO</small></i></li>
    <li><i><small>5 2n ESO</small></i></li>
    <li><i><small>6 3r ESO</small></i></li>
    <li><i><small>7 4rt ESO</small></i></li>
    <li><i><small>8 1r BAX</small></i></li>
    <li><i><small>9 2n BAX</small></i></li>
    <li><i><small>10 1r FPB Info</small></i></li>
    <li><i><small>11 2n FPB Info</small></i></li>
    <li><i><small>12 1r FPB Fabricacio</small></i></li>
    <li><i><small>13 2n FPB Fabricacio</small></i></li>
  </ul>
  <button type="submit" name="guardar" class="btn btn-success">Save</button>
</form>
