<?php
include 'bd.php';
include '..//views/common/header.php';

if (isset($_POST['btnguarda'])){
    $nombre = $_POST['nombre'];
    $idgp = (int)$_POST['idgp'];
    $save = mysqli_query($conn, "INSERT INTO Asignatura (nombre, idGrupo)
                                        VALUES ('$nombre', '$idgp') ");
    if (!$save){
        echo "<script>alert('Couldnt save, error query')</script>";
        header("Refresh:0;url=admin.php");
    }else{
        echo "<script>alert('saved successfully')</script>";
        header("Refresh:0;url=admin.php");
    }
}

?>

    <form action="addAsignaturasController.php" method="POST">
        <label for="">nombre: <input type="text" required="required" name="nombre"></label><br>
        <label for="">id grupo: <input type="number" name="idgp" id="idgp" required="required"></label><br>
        <input type="submit" name="btnguarda" value="guarda" class="btn btn-info">
    </form>

<?php
include '..//views/common/footer.php';
?>