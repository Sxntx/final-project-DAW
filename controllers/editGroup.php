<?php
include('bd.php');
if (isset($_GET['id'])){
    $grupo_id = $_GET['id'];
    $q = mysqli_query($conn, "SELECT * FROM Grupo WHERE id = '$grupo_id'");
    while ($r = $q->fetch_assoc()){
        $bd_id = $r['id'];
        $bd_nombre = $r['nombre'];
        $bd_aula = $r['aula'];
        $bd_idprofe = $r['idProfesor'];
    }
}
?>

<form class='' action="editGroup.php?id=<?php echo $_GET['id']; ?>" method='POST'>
<?php echo "
<label>id:<input type='number' name='i_id' id='i_id' value=$bd_id></label><br>
<label>nombre: <input type='text' name='i_name' id='i_name' value=$bd_nombre></label><br>
<label>aula: <input type='number' name='i_aula' id='i_aula' value=$bd_aula></label><br>
<label>id profesor: <input type='number' name='i_idprofe' id='i_idprofe' value=$bd_idprofe></label>
        ";
?>

</form>
