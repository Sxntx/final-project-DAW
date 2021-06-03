<!--Bloque de código a incluri en usurio administrador-->
<?php
include('bd.php');
$_SESSION['logged'] = true;
include('..//views/common/header.php');
?>
<script>
function confirmar (){
  if(!confirm("Seguro que quieres borrar")){
    document.cookie = "borrar=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
    alert("operacion cancelada");
  }else{
    document.cookie = "borrar=true";
    window.location = "deleteController.php";
  }
}
</script>

<div class="container">
  <div class="row">
    <div class="col-md-12 text-center h3 mt-5 mb-5">
      Añade, edita y/o elimina personal.
    </div>
  </div>
  <div class="row mb-3">
      <a href="addPersonalController.php">Añade (+)</a>
  </div>

    <div class="overflow-auto" style="height: 400px;">
  <table class="col6 table overflow-auto">

    <thead>
      <th>id</th>
      <th>nombre</th>
      <th>apellidos</th>
      <th>usuario</th>
      <th>contrasenya</th>
      <th>tipoUsuario</th>
      <th>idGrupo</th>
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
    <a href="deleteController.php?id=<?php echo $row['id']?>?tipoUsuario=<?php echo $row['idTipoUsuario']?>" class="btn btn-danger" onclick="confirmar()">delete</a>
  <?php  echo "</td></tr>"; } ?>

      </tbody>
  </table>
    </div>
    <!-- GRUPOS -->
    <div class="row">
        <div class="col-md-12 text-center h3 mt-5 mb-5">
            Añade, edita y/o elimina Grupos.
        </div>
    </div>
    <div class="overflow-auto" style="height: 400px;">
    <table  class="col6 table">
        <thead>
        <th>id</th>
        <th>nombre</th>
        <th>aula</th>
        <th>idProfesor</th>
        <th></th>
        </thead>
        <tbody>
        <?php
        $q_grupo = mysqli_query($conn, "SELECT * FROM Grupo");
        while ($grupo = $q_grupo->fetch_assoc()){
            $grupo_id = $grupo['id'];
            $grupo_name = $grupo['nombre'];
            $grupo_idGrupo = $grupo['aula'];
            $grupo_tutor = $grupo['idProfesor'];
            echo "<tr><td>$grupo_id</td>
                  <td>$grupo_name</td>
                  <td>$grupo_idGrupo</td>
                  <td>$grupo_tutor</td>
                  <td>";?>
                  <a href="editGroup.php?id=<?php echo $grupo['id']?>" class='btn btn-secondary'>Edit</a>
                  <a href='deleteGroup.php?id=<?php echo $grupo['id']?>' class='btn btn-danger'>Detele</a>
                   <?php echo"</td></tr>"; } ?>

        </tbody>

    </table>
    </div>

    <!--  ASIGNATURAS  -->
    <div class="row">
        <div class="col-md-12 text-center h3 mt-5 mb-5">
            Añade, edita y/o elimina Asignaturas.
        </div>
    </div>

    <div class="overflow-auto" style="height: 400px;">
    <table  class="col6 table">
        <thead>
        <th>id(codigo)</th>
        <th>nombre</th>
        <th>idGrupo</th>
        </thead>
        <tbody>
        <?php
        $q = mysqli_query($conn, "SELECT * FROM Asignatura");
        while ($asignaturas = $q->fetch_assoc()){
            $asig_id = $asignaturas['codigo'];
            $asig_name = $asignaturas['nombre'];
            $asig_idGrupo = $asignaturas['idGrupo'];
            echo "<tr><td>$asig_id</td>
                  <td>$asig_name</td>
                  <td>$asig_idGrupo</td></tr>";
        }
        ?>
        </tbody>

    </table>
    </div>
</div>
