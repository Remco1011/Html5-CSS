<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="Registratie.css">
    </head>
    <body>

    <header class="container-fluid"> <h1> Rotterdam runningcrew Registratie</h1></header>

        <?php
        require "database.php" ;

     ?>

      <form method="post" action="welcome.php">
  <div class="form-row">
    <div class="col-sm-12">
      <input type="text" name="Username" class="form-control" placeholder="Username">
    </div>
     <br> <br>
    <div class="col-sm-12">
      <input type="text" name="voornaam" class="form-control" placeholder="voornaam">

    </div>
       <br> <br>
          </div>
       <div class="form-row">
      <div class="col-sm-12">
      <input type="text" name="achternaam" class="form-control" placeholder="achternaam">

         </div>
            <br> <br>
       <div class="col-sm-12">
       <input type="text" name="Email" class="form-control" placeholder="Email">

         </div>
            <br> <br>
             </div>
                 <div class="form-row">

       <div class="col-sm-12">
       <input type="text" name="woonplaats" class="form-control" placeholder="Woonplaats">

         </div>
        <br> <br>
      <div class="col-sm-12">
      <input type="date" name="Geboortedatum" class="form-control" placeholder="Geboortedatum">
                   </div>
                      <br> <br>
          </div>
        <div class="form-row">
        <div class="col-sm-12">
      <input type="password" name="Wachtwoord" class="form-control" placeholder="Wachtwoord">
                       </div>
             <br> <br>
      <div class="col-sm-12">
      <input type="password" name="Wachtwoord2" class="form-control" placeholder="Herhaal Wachtwoord">
    </div>
     <br> <br>
    </div>

    <button class="btn btn-block btn-primary" type="submit" name="registreer">Registreer</button>
  </form>
  <form class="" action="home.php" method="post">
    <button class="btn btn-block btn-primary" type="submit" name="Terug">Terug</button>
  </form>
  <form class="" action="home.php" method="post">
    <button class="btn btn-block btn-primary" type="submit" name="Account">Heb al een account</button><br>
  </form>
</form>

</body>
</html>
