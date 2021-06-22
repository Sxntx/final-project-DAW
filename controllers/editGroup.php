<?php
include('bd.php');
include('..//views/common/header.php');
$ext = 108;
if (isset($_GET['id'])){
    $grupo_id = $_GET['id'];
    $q = mysqli_query($conn, "SELECT * FROM Grupo WHERE id = '$grupo_id'");
    while ($r = $q->fetch_assoc()){
        $bd_id = $r['id'];
        $bd_nombre = $r['nombre'];
        $bd_aula = $r['aula'];
        $bd_idprofe = $r['idProfesor'];
    }
    $ext+=$bd_idprofe;

    $typ = gettype($ext);

}

if (isset($_POST['btn_upt_gp'])){
    $n_id = $_POST['i_id'];
    $n_name = $_POST['i_name'];
    $n_aula = $_POST['i_aula'];
    $n_idProfe = $_POST['i_idprofe'];


    $update_personal_idCurso = mysqli_query($conn, "UPDATE Personal set idCurso = '$n_id'
                                                            WHERE id = '$ext'");

    $insert_query = mysqli_query($conn, "UPDATE Grupo set nombre = '$n_name', aula = '$n_aula', 
                                                                 idProfesor = '$n_idProfe' WHERE id = '$grupo_id' ");
    if (!$insert_query){
        echo "insert query feiled";
    }else   header("Refresh:0;url=admin.php");

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
                    
                  </script>";2

?>
<script>
function muestra() {//show clas ids
document.getElementById("lista").removeAttribute('hidden');
}

function oculta() {//hidde clas id
document.getElementById("lista").setAttribute('hidden', true);
}
</script>

<div class="container text-center mb-5">
    <div class="row">
        <div class="col-12 h2 mt-5 mb-5"> Edita grupo</div>
    </div>
<form class='' action="editGroup.php?id=<?php echo $_GET['id']; ?>" method='POST'>
<?php echo "
<label>id:<input type='number' name='i_id' id='i_id' value=$bd_id></label><br>
<label>nombre: <input type='text' name='i_name' id='i_name' value='$bd_nombre'></label><br>
<label>aula: <input type='number' name='i_aula' id='i_aula' value=$bd_aula></label><br>
<label>id profesor: <input type='number' name='i_idprofe' id='i_idprofe' value=$bd_idprofe></label><br>
        ";
?>
    <i id="show" onmouseover="muestra()"
       onmouseout="oculta()"><small>ratón aquí
            para info acerca del profesorado</small></i>
    <small>
        <table class="table table-sm table-bordered" hidden id="lista" ">
            <thead>
            <th>id</th>
            <th>nombre completo</th>
            <th>email</th>
            <th>telefono</th>
            </thead>
            <!--Hacer lista de profesores por id-->
            <?php
            $lista_profes = mysqli_query($conn, "SELECT * FROM Profesor");
            $rows = $lista_profes->fetch_all(MYSQLI_ASSOC);
            foreach ($rows as $row) {
                $idp = $row['idPersonal'];
                echo "<tr><td>" . $row['id'] . '</td>
                        <td>';
                $qname_profe = mysqli_query($conn, "SELECT nombre, apellidos FROM Personal 
                                                               WHERE id = '$idp'");
                while ($resp = $qname_profe->fetch_assoc()) {
                    echo $resp['nombre'] . ' ' . $resp['apellidos'];
                }
                echo '</td>
                        <td>' . $row['Email'] . '</td>
                         <td>' . $row['Telefono'] . "</td></tr>";
            }

           ?>
        </table>
    </small><br><br>
    <button type='submit' name='btn_upt_gp' class='btn btn-info'>save</button>
</form>
</div>

<?php
include '../views/common/footer.php';
