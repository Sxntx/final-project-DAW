<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--JS custom-->
    <script src="../final/controllers/javaScript.js" charset="utf-8"></script>
    <title>IES Son Ferrer</title>
  </head>
  <body>
    <div class="container" >
      <div class="row mb-n3">
        <div class="col-6">
          <img src="imgs/departament.png" alt="">
        </div>
        <div class="col-6">

          <p id='session' class='float-right'>No heu iniciat sessió
          <a href='login.php' class='text-info'>(Inicia sesió)</a>

           </p>
        </div>

      </div>
    </div>
    <nav class="navbar navbar-expand-md navbar-light barraLog" style="background-color: #4E006D";>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#desple" >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="desple">
        <a class="navbar-brand text-light" href="index.php">IES SON FERRER</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link text-light" href="login.php" hidden>Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="books.php" hidden>Lorem</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="contact.php" hidden>Contact</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
          <input class="form-control mr-sm-4" id="search" onkeyup="yesTwo()" name="item" type="search" placeholder="Curso, Materia.." aria-label="Search" hidden>
          <datalist id="dtlist" onkeyup="yesTwo()">
          </datalist>
          <button class="btn btn-outline-success my-2 my-sm-0" name="btnSearch" type="submit" hidden>search</button>
        </form>
      </div>
    </nav>
    <div class="container-fluid bg-light"  style="border-bottom: 1px solid #4E006D;">
      <div class="row align-items-center">
        <div class="col-6">
          <div class="h3">
            IES SON FERRER
          </div>
        </div>
        <div class="col-md-6">
          <img src="imgs/niños-estudiando.jpg" style="opacity:0.4!important;" class="mb-1 float-right" alt="niños">
        </div>
      </div>
    </div>
