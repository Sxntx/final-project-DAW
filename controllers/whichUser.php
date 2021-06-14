<?php
include('bd.php');
$username = $_POST['username'];
$password = $_POST['password'];
#get user type for views
$res = mysqli_query($conn, "SELECT * FROM Personal WHERE usuario  = '$username'
                                                                  AND contrasenya = '$password'");
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$idpers = $row['id'];
$bduser = $row['usuario'];
$bdpass = $row['contrasenya'];
$usertype = $row['idTipoUsuario'];
$cursoid = $row['idCurso'];

if ($username !== $bduser || $password !== $bdpass) {
    echo "<script>alert('Usuari o contrasenya incorrecte, torna-ho a intentar.')</script>";
    header('Refresh:0; url=/AtomClass/final/login.php');
} else {
        session_start();
        $_SESSION['logged'] = true;

        if ($usertype == 0) {
            echo "<script>alert('Bienvenido admin')</script>";
            header('Refresh:0; url=/AtomClass/final/controllers/admin.php');
        }
        if ($usertype == 1 && $cursoid > 0) {
            echo "<script>alert('Bienvenido profe')</script>";
            $consulta = mysqli_query($conn, "SELECT * FROM Profesor WHERE idPersonal = '$idpers'");
            while ($r = $consulta->fetch_assoc()){
                $idProfe = $r['id'];
            }
            $_SESSION['idpr'] = $idProfe;
            $_SESSION['profeLoged'] = true;
            $_SESSION['idCurso'] = $cursoid;
            header('Refresh:0; url=../views/profeView.php');
        }
        else if ($usertype == 2 && $cursoid > 0) {
            echo "<script>alert('Bienvenido alumno')</script>";
            setcookie("logedAlumno",true);
            $_SESSION['idCurso'] = $cursoid;
        }

}
?>
