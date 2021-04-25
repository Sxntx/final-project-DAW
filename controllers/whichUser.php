<?php
include('bd.php');
$username = $_POST['username'];
$password = $_POST['password'];
   #Aqui conntrolaremos si inicia sesion admin, profe or alumno
   $res = mysqli_query($conn, "SELECT * FROM Personal WHERE usuario  = '$username'");
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   $bduser = $row['usuario'];
   $bdpass =  $row['contrasenya'];
   if ( $username !== $bduser or $password  !== $bdpass){
         echo "<script>alert('Usuari o contrasenya incorrecte, torna-ho a intentar.')</script>";
         header('Refresh:0; url=/AtomClass/final/login.php');
       }else{
          session_start();
         if(!isset($_SESSION['logged'])){
   $_SESSION['logged'] = true;
   echo "<script>alert('Bienvenido admin')</script>";
   header('Refresh:0; url=/AtomClass/final/controllers/admin.php');
 }
}

 ?>
