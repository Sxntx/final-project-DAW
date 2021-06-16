<?php
include "bd.php";

$idprofe = (int)$_SESSION['idpr'];
$idcurso = $_SESSION['idCurso'];

$path = "archivos_profes/";
$target_file =  $path.basename($_FILES['file']['name']);
$uploadOK = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


if (isset($_POST['btn-file'])) {
    if (!empty($_FILES['file']['name'])) {
        $archivo = $_FILES['file']['name'];
        $check = getimagesize($_FILES['file']['tmp_name']);
        if ($check !== false) {
            echo "Fil is an image - " . $check['mime'] . ".<br>";
            $uploadOK = 1;
        } else {
            echo "File is not an  image<br>";
        }
    }

    if (file_exists($target_file)) {
        echo "Archivo ya existente<br>";
        $uploadOK = 0;
    }

    if ($_FILES['file']['size'] > 500000) {
        echo "Archivo muy grande";
        $uploadOK = 0;
    }

    if ($uploadOK == 0) {
        echo "File not  uploaded";
    } else {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
            $titulo = $_POST['titulo'];
            $descripcion =  $_POST['textarea'];
            $fecha = date('Y-m-d H:i:s');
            $qa = mysqli_query($conn, "SELECT * FROM Asignatura WHERE idGrupo = '$idcurso' AND
idProfe = '$idprofe'");

            while ($r =  $qa->fetch_assoc()){
                $codigoAsig = (int)$r['codigo'];
            }
            $q = mysqli_query($conn, "INSERT INTO Deberes (titulo, descripcion, fecha, idprofe,idGrupo, archivo)
VALUES ('$titulo', '$descripcion', '$fecha', '$idprofe', '$codigoAsig', '$archivo')");

            if (!$q){
                echo "error saving  at db";
            }else{
                echo "<script>alert('Homework saved!')</script>";
                header("Refresh:0;url=../views/profeView_basic.php");
            }

            echo "The file " . htmlspecialchars(basename($_FILES['file']['name'])) . "
has been uploaded<br>";
        } else {
            echo "Was an error while uploading  your file";
        }
    }

}
?>