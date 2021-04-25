<!--Bloque de código a incluri en usurio administrador-->
<?php
include('bd.php');
$_SESSION['logged'] = true;
include('..//views/common/header.php');
?>
<div class="container">
  <div class="row">
    <div class="col-md-12 text-center h3 mt-5 mb-5">
      Añade, edita y/o elimina personal.
    </div>
  </div>
  <div class="row mb-3">
      <a href="anyadir.php">Añade (+)</a>
  </div>
  <table class="col6 table">

    <thead>
      <th>id</th>
      <th>nombre</th>
      <th>apellidos</th>
      <th>usuario</th>
      <th>contrasenya</th>
      <th>tipoUsuario</th>
      <th>idCurso</th>
      <th></th>
    </thead>
    <tbody>
  <?php
  $query = mysqli_query($conn, "SELECT * FROM Personal");
  while($row = $query->fetch_assoc()){
    $id=$row['id'];
    $nombre=$row['nombre'];
    $apellidos=$row['apellidos'];
    $usuario=$row['usuario'];
    $contrasenya=$row['contrasenya'];
    $idTipoUsuario=$row['idTipoUsuario'];
    $idCurso=$row['idCurso'];

    echo "<td>".$id."</td>";
    echo "<td>".$nombre."</td>";
    echo "<td>".$apellidos."</td>";
    echo "<td>".$usuario."</td>";
    echo "<td>".$contrasenya."</td>";
    echo "<td>".$idTipoUsuario."</td>";
    echo "<td>".$idCurso."</td>";
    echo "<td>";
    ?>
    <a href="editController.php?id=<?php echo $row['id']?>" class="btn btn-secondary">Edit </a>
    <a href="deleteController.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete </a>
  <?php  echo "</td></tr>"; } ?>

      </tbody>
  </table>
</div>
