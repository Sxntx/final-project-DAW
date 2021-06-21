<?php
include "bd.php";
if (!$_GET['id']){
    echo "no id";
}else{

    $idTarea = $_GET['id'];
    $q = mysqli_query($conn, "DELETE FROM Deberes WHERE id = '$idTarea'");
    echo "<script>alert('Borrado con éxito')</script>";
    header("Refresh:0;url=profeView_basic.php");
}


?>