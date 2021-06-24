<?php

include 'bd.php';

//cuando guardamos el deber entregado
if (!isset($_POST['btn-guarda'])){
    echo "hola";
}else{

    $path = "entregas_deberes/";
    $target_file =  $path.basename($_FILES['file']['name']);
    //$uploadOK = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    $idasig = $_SESSION['id_asig'];
    $idprofe = $_SESSION['id_profe'];
    $archivo = $_FILES['file']['name'];
    $nv = 'SF'.$_SESSION['idpers'];
    $q_two = mysqli_query($conn, "SELECT *  FROM Alumno WHERE nExp = '$nv'");

    while ($m = $q_two->fetch_assoc()){
        $id_al = $m['id'];
    }

    $q_tre = mysqli_query($conn, "SELECT * FROM Deberes WHERE idprofe = '$idprofe'
                                                                AND idGrupo = '$idasig'");

    while ($p = $q_tre->fetch_assoc()){
        $id_deber = $p['id'];
    }
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
        $save = mysqli_query($conn, "INSERT INTO Entregas (id_asig, id_alum, id_deber, archivo) 
                                        values ('$idasig', '$id_al', '$id_deber', '$archivo')");

        if (!$save){
            echo "error, no se pudo guardar la tarea";
        }else{
            echo "<script>alert('Tarea guardada')
            </script>";
            header("Refresh:0;url=alumnoView_basic.php");
        }
    }


}


?>