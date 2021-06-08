<?php
include 'bd.php';
include '..//views/common/header.php';

if (isset($_POST['editarbtn'])){

    $n_codigo = $_POST['codigo'];
    $n_nombre = $_POST['nombre'];
    $n_idgrupo = $_POST['idgrupo'];

    $save_edit = mysqli_query($conn, "UPDATE Asignatura set codigo = '$n_codigo',
                                                                   nombre = '$n_nombre',
                                                                   idgrupo = '$n_idgrupo'
                                             WHERE codigo = '$n_codigo'");
    if(!$save_edit){
        echo "<script>alert('Couldnt save query')</script>";
    }else{
        echo "<script>alert('updated successfully')</script>";
        header("Refresh:0;url=admin.php");
    }

}

if (isset($_GET['id'])){
    $id_asig  = $_GET['id'];
    $q = mysqli_query($conn, "SELECT * FROM Asignatura WHERE codigo = '$id_asig'");
    while ($row =  $q->fetch_assoc()){
        $codigo = $row['codigo'];
        $nombre  =  $row['nombre'];
        $idGrupo =  $row['idGrupo'];
    }
}


    echo "
    <div class='container text-center'>
    <div class='row h2'>
    <div class='col-12'>
    Edita asignatura
</div></div>
</div>
<form action='editAsignatura.php' method='POST'>
        <label>Código: <input type='number' id='codigo' name='codigo' value=$codigo></label><br>
        <label for=''>nombre: <input type='text' id='nombre' name='nombre' value=$nombre></label><br>
        <label for=''>id grupo: <input type='number' name='idgrupo' id='idgrupo' value=$idGrupo></label><br>
        <input type='submit' class='btn btn-success' name='editarbtn' id='editarbtn' value='guardar'>
    </form>
    ";

include '..//views/common/footer.php'

?>