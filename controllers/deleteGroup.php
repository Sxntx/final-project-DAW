<?php
include ('bd.php');

if (!isset($_GET['id'])){
    echo "Algo fue mal, no se pudo borrar";
    header("Refresh:0;url=admin.php");
}else {
        $idGrupo = $_GET['id'];
        $borrarOK = $_COOKIE['borrarGrupo'];
        if ($borrarOK == true){
        $q_del_grupo = mysqli_query($conn, "DELETE FROM Grupo WHERE id = '$idGrupo'");

    if (!$q_del_grupo){
        echo "<script>alert('Error query, couldnt delete)</script>";
        header("Refresh:0;url=admin.php");
    }else{
        echo "<script>alert('Borrado correctamente')</script>";
        header("Refresh:0;url=admin.php");
    }
}

?>