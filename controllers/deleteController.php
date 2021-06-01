<?php
include('bd.php');

  if (isset($_GET['id'])) {//validamos que el id haya sido enviado para borrar  personal
    $id  = $_GET['id'];
    #header('Refresh:0;');
      #Debemos hacer el select del id y obtener tipo de user y luego borrar en las tablas pertinientes
      $select = mysqli_query($conn, "SELECT * FROM Personal WHERE id = '$id'");
      while ($row = $select->fetch_assoc()) {//dump result query
          $id = $row['id'];
          $nombre = $row['nombre'];
          $apellidos = $row['apellidos'];
          $usuario = $row['usuario'];
          $idTipoUsuario = $row['idTipoUsuario'];
      }

      if ($idTipoUsuario  == 1 ){//OK if is profesor
          $q_del_personal = mysqli_query($conn, "DELETE FROM Personal WHERE id = '$id'");
          $q_del_profe = mysqli_query($conn, "DELETE FROM Profesor WHERE idPersonal = '$id'");
          header('Refresh:0; url=admin.php');
      }elseif ($idTipoUsuario == 2){//OK if is alumno
          $q_del_a_personal = mysqli_query($conn, "DELETE FROM Personal WHERE id = '$id'");
          $nExpediente = 'SF'.$id;
          $q_del_alumno = mysqli_query($conn, "DELETE FROM Alumno WHERE nExp = '$nExpediente'");;

          if (!$q_del_a_personal){
              echo "Fail query personal";
          }elseif ("$q_del_alumno"){
              echo "Fail query alumno";
          }
      }

  }
  header('Refresh:0; url=admin.php');
