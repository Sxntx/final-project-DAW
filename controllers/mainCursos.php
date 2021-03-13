<style media="screen">
.caret{
border-top: 4px solid;
}
}
</style>
<div class="container">
  <div class="row">
    <!--Div as aside to show fastest list of courses-->
    <div class="col mt-3 d-sm-none d-md-block mr-2 ml-n1">
      <!--Navegació-->
      <div class="header ml-n5 mr-5">
        <div class="title text-center pt-1 pb-1 rounded" style="background-color: #4E006D";>
          <h5 class="text-light">Navegació</h5>
          <div class="content  bg-light">
            <a href="index.php">Inici</a>
            <?php #Main donde se muestran los cursos actuales

            $ctgy = [];
            $res = mysqli_query($conn,"SELECT nombre FROM Grupo");
            while($row = $res->fetch_assoc()){
            array_push($ctgy,$row['nombre']);
            }
            $len = count($ctgy);
            for ($i = 0; $i< $len; $i++){
              $tmp;
                echo '<div class="dropdown">
                        <button class="btn btn-secondary dropdown-toogle" style="width: 100%;" type="button" data-toggle="dropdown">
                          '.$ctgy[$i].'</button><span class="glyphicon glyphicon-align-left"></span>';
                    $tmp = mysqli_query($conn, "SELECT nombre FROM Asignatura WHERE idGrupo =  $i");
                    $asignaturas = [];
                    while($rw = $tmp->fetch_assoc()){
                    array_push($asignaturas,$rw['nombre']);
                    }
                echo '<ul class="dropdown-menu">';
                          for ($a=0; $a < count($asignaturas); $a++) {
                            echo  '<li><a class="dropdown-item" href="#"">'.$asignaturas[$a].'</a></li>';
                          }
                    echo '</ul></div>';
             }

             ?>
          </div>
        </div>
      </div>
      <!--Avisos -->
      <div class="header mt-3 ml-n5 mr-5">
        <div class="title text-center pt-1 pb-1  rounded" style="background-color: #4E006D";>
          <h5 class="text-light">Avisos - Informació</h5>
          <div class="content bg-light">
            Mostrar info
          </div>

        </div>
      </div>

    </div>

    <!--Div as section-->
    <div class="col-xs-12 col-md-9">
      <div class="texte-center h2 mt-4 mb-4">
        Llistat de cursos 2020-2021
      </div>
      <table class="table table-hover mt-5"  data-toggle-column="last">
        <tbody>
      <?php #Main donde se muestran los cursos actuales

      $ctgy = [];
      $res = mysqli_query($conn,"SELECT nombre FROM Grupo");
      while($row = $res->fetch_assoc()){
      array_push($ctgy,$row['nombre']);
      }
      $len = count($ctgy);
      for ($i = 0; $i< $len; $i++){
        $tmp;
          echo '<tr><td>
                <button id="'.$i.'"class="btn h5 text-primary" onclick="asigna(this)" >
                  <strong>'
                          .$ctgy[$i].
                  '</strong>
                </button>
              </td></tr>';
              $tmp = mysqli_query($conn, "SELECT nombre FROM Asignatura WHERE idGrupo =  $i");
              $asignaturas = [];
              while($rw = $tmp->fetch_assoc()){
              array_push($asignaturas,$rw['nombre']);
              }
          echo '<tr hidden>
                  <td>
                    <div>';
                    for ($a=0; $a < count($asignaturas); $a++) {
                      echo  '<li>'.$asignaturas[$a].'</li>';
                    }
              echo '</div>
                  </td>
                </tr>';
       }

       ?>
     </tbody>
       </table>
    </div>
  </div>
</div>
