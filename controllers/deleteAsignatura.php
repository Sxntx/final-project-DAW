<?php
include "bd.php";

if (!isset($_GET['id'])){
    echo "no hay id";

}else{
    $id = $_GET['id'];
    $borraOK = $_COOKIE['borrarAsignatura'];
    if ($borraOK == true) {
        $del_asig = mysqli_query($conn, "DELETE FROM Asignatura WHERE codigo = '$id'");
        if (!$del_asig) {
            echo "<script>alert('failed executin delete query')</script>";
        } else {
            echo "<script>alert('delete asignatura successfully')</script>";
            header("Refresh:0;url=admin.php");
        }

    }else
    {
        header("Refresh:0;url=admin.php");
    }

}

?>