<?php
include "bd.php";

$path = "archivos_profes/";
$target_file =  $path.basename($_FILES['file']['name']);
$uploadOK = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


if (isset($_POST['btn-file'])) {
    if (!empty($_FILES['file']['name'])) {
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
            $q = mysqli_query($conn, "INSERT INTO Deberes (titulo, descripcion, fecha, idprofe)
VALUES ()");
            echo "The file " . htmlspecialchars(basename($_FILES['file']['name'])) . "
has been uploaded<br>";
        } else {
            echo "Was an error while uploading  your file";
        }
    }

}
?>