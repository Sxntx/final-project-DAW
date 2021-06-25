<?php
include 'bd.php';

//accion despues de pulsar el boton actualizar tarea

if (isset($_POST['btn-up-tarea'])){
    $id = $_POST['id_d'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $idprofe = $_POST['idprofe'];
    $idgrupo = $_POST['idgp'];
    $archivo = $_POST['archivo'];

    $q =  mysqli_query($conn, "UPDATE Deberes SET titulo = '$titulo',
                                                         descripcion = '$descripcion',
                                                         fecha  = '$fecha',
                                                         idprofe = '$idprofe',
                                                         idGrupo = '$idgrupo',
                                                         archivo = '$archivo'
                                        WHERE id = $id");

    if (!$q){
        echo "actualizacion fallida";
    }else{
        echo "<script>alert('actualizado correctamente!')</script>";
        header("Refresh:0;url=profeView_basic.php");
    }

}

//Codigo para corregir error de rutas imgs
echo "<script>
                
                document.addEventListener('DOMContentLoaded', function() {
                  var src1 = document.getElementById('img_dep').src = '../views/common/imgs/departament.png';
                    var src2 = document.getElementById('img_ninios').src = '../views/common/imgs/niños-estudiando.jpg';
                    var src3 = document.getElementById('consll').src = '../views/common/imgs/logo_main.png';
                    var src4 = document.getElementById('moodl').src =  '../views/common/imgs/logo_moodle.png';
                    var src5 = document.getElementById('sonfe_text').href =  '../index.php';
                }) 
                    
                  </script>";

include '../views/common/header.php';

if (!$_GET['id']){
    echo "no id";
}else {
    $id = $_GET['id'];
    $q = mysqli_query($conn, "SELECT * FROM Deberes  WHERE id = '$id'");
     while ($r = $q->fetch_assoc()){

         $id = $r['id'];
         $titulo = $r['titulo'];
         $descripcion = $r['descripcion'];
         $fecha = $r['fecha'];
         $idprofe = $r['idprofe'];
         $idgp = $r['idGrupo'];
         $archivo = $r['archivo'];
     }
}

echo "
<div class=\"container text-center mt-5 mb-5\">
    <div class=\"row mb-3\">
        <div class=\"col-12 h3\">
                Edita tarea
        </div>
    </div>
<form action='editTarea.php' method='post'>
<label hidden>id: <input type='number' name='id_d' class='form-control' value='$id'></label><br>
<label>Título: <input type='text' name='titulo' class='form-control' value='$titulo'></label><br>
<label>Fecha: <input type='date' name='fecha' class='form-control' value='$fecha' readonly></label><br>
<label>Nuevo archivo: <input type='file' name='archivo' class='form-control' placeholder='$archivo'></label><br>
<label>Descripcion: <textarea type='text' name='descripcion' class='form-control' placeholder='$descripcion'></textarea></label><br>
<label hidden>ID Grupo: <input type='number' name='idgp' class='form-control' value='$idgp'></label>
<label hidden>ID profe: <input type='date' name='idprofe' class='form-control' value='$idprofe' readonly></label><br>

<input type='submit' name='btn-up-tarea' class='btn btn-success'>
</form>
</div>
";
?>

<?php
include '../views/common/footer.php';
