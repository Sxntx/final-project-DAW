<?php
include "db.php";
if (!$_GET['id']){
    echo "no id";
}else {
    $id = $_GET['id'];
    $q = mysqli_query($conn, "SELECT * FROM Deberes  WHERE id = '$id'");
     while ($r = $q->fetch_assoc()){

     }


}



?>