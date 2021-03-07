<?php include('views/common/header.php');
      include('controllers/bd.php')?>
<div class="container">
  <div class="row">
    <div class="col-4">
    </div>
    <div class="col-8">
      <div class="texte-center h2 mt-4 mb-4">
        Llistat de cursos 2020-2021
      </div>
      <table class="table table-hover mt-5">
        <tbody>
      <?php #Main donde se muestran los cursos actuales

      $ctgy = [];
      $res = mysqli_query($conn,"SELECT nombre FROM Grupo");
      //$asig = myqli_query($conn, "SELECT nombre  FROM Asignatura WHERE idGrupo ");
      while($row = $res->fetch_assoc()){
      array_push($ctgy,$row['nombre']);
      }
      $len = count($ctgy);
      for ($i = 0; $i< $len; $i++){
          echo '<tr><th scope="row"><button id="'.$i.'"class="btn h5 text-primary" onclick="asigna(this.id)"data-toogle="collapse" data-target="#'.$i.'" ><strong>'
                  .$ctgy[$i].
               '<div class="toogle"
               </strong></button></th></tr>';
       }
       for ($i=0; $i <  ; $i++) {
         // code...
       }
       ?>
     </tbody>
       </table>
    </div>
  </div>
</div>
<?php include('views/common/footer.php')?>
