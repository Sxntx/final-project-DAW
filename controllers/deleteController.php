<?php
include('bd.php');

  if (isset($_GET['id']) && $_COOKIE['borrar']) {//validamos que el id haya sido enviado para borrar  personal
    $id  = $_GET['id'];
    #header('Refresh:0;');
      $query = mysqli_query($conn, "DELETE FROM Personal WHERE id = '$id'");
      header('Refresh:0; url=admin.php');

  }
  header('Refresh:0; url=admin.php');
