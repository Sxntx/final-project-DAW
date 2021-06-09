<?php
include "bd.php";
include "../views/common/header.php";

$idcurso = $_SESSION['idCurso'];

$q  = mysqli_query($conn, "SELECT * FROM Personal WHERE 
                                        idTipoUsuario = 2  AND idCurso = '$idcurso'");
echo "<table class='table table-stribed'><thead>
    <th>nombre</th>
    <th>apellido</th>
    <th>Retraso</th>
    <th>Asistencia</th>
</thead>
<tbody>";
while ($r = $q->fetch_assoc()) {
    $name = $r['nombre'];
    $apellidos = $r['apellidos'];
    echo "<tr>
        <td>$name</td>
        <td>$apellidos</td>
        <td><input type='checkbox' name='retraso'></td>
        <td><input type='checkbox' name='asistencia'></td>
        
</tr>";
}

?>
    </tbody></table>

    <a href=""><input type="submit" class="btn btn-warning" value="guarda"></a>


<?php
include "../views/common/footer.php"
?>