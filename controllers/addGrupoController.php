<?php
include('bd.php');
include('..//views/common/header.php');

if (!isset($_POST['guarda'])){
    echo "algo fue mal";
}else{
    $aulaGrupo = "";
    $nombreGrupo = $_POST['nombreGrupo'];
    $aulaGrupo = (int)$_POST['aulaGrupo'];
    $idProfe = (int)$_POST['idProfe'];

    $q_save = mysqli_query($conn, "INSERT INTO Grupo (nombre, aula, idProfesor)
VALUES ('$nombreGrupo', '$aulaGrupo', '$idProfe')");

    if(!$q_save){
        header("Refresh:0;url=addGrupoController.php");
        echo "<script>alert('Error al ejecutar query save, try again')</script>";
    }else{
        header("Refresh:0;url=admin.php");
        echo "<script>alert('Guardado con éxito')</script>";
    }
}

?>

<div class="container">
    <div class="row">
        <div class="col6 h3"> Añade grupo</div>
    </div>
</div>
<form action="addGrupoController.php" method="post">
    <label for="">
        nombre: <input type="text" name="nombreGrupo">
    </label><br>
    <label for="">
        aula: <input type="number" min="0" name="aulaGrupo">
    </label><br>
    <label for="">
        idProfe: <input type="number" min="0" name="idProfe">
    </label><br>
    <input class="btn btn-success" type="submit" value="guardar" name="guarda">
</form>