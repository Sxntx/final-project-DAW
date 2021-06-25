<?php
include('bd.php');
include('..//views/common/header.php');

if (!isset($_POST['guarda'])){
    echo "";
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

echo "<script>
                
                document.addEventListener('DOMContentLoaded', function() {
                  var src1 = document.getElementById('img_dep').src = '../views/common/imgs/departament.png';
                    var src2 = document.getElementById('img_ninios').src = '../views/common/imgs/niños-estudiando.jpg';
                    var src3 = document.getElementById('consll').src = '../views/common/imgs/logo_main.png';
                    var src4 = document.getElementById('moodl').src =  '../views/common/imgs/logo_moodle.png';
                    var src5 = document.getElementById('sonfe_text').href =  '../index.php';
                }) 
                    
                  </script>";

?>

    <div class="container text-center mt-5 mb-5">
        <div class="row mb-3">
            <div class="col-12 h3">
                Añade grupo
            </div>
        </div>
<form action="addGrupoController.php" method="post">
    <label for="">
        nombre: <input type="text" class="form-control" name="nombreGrupo">
    </label><br>
    <label for="">
        aula: <input type="number" class="form-control" min="0" name="aulaGrupo">
    </label><br>
    <label for="">
        idProfe: <input type="number" class="form-control" min="0" name="idProfe">
    </label><br>
    <input class="btn btn-success mt-3" type="submit" value="guardar" name="guarda">
</form>
    </div>

<?php
include '../views/common/footer.php';