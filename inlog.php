<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="Registratie.css">
    <title>Inlog Rotterdam runningcrew</title>

  </head>
  <body>
    <header class="container-fluid"> <h1> Login Rotterdam runningcrew</h1></header>
  <form class="inlog"method="post">
    <div class="container-fluid">
      <div class="col-sm-12">
        <input type="text" name="Username" class="form-control" placeholder="Username">
        <br>
      </div>
       </div>
  <div class="container-fluid">
      <div class="col-sm-12">
    <input type="password" name="Wachtwoord" class="form-control" placeholder="Wachtwoord">
      <br>
     </div>
      </div>
      <div class="container-fluid">
      <button class="btn btn-block btn-primary" type="submit" name="submit">Login</button>
    <br>

    </form>
    <form class="" action="home.php" method="post">
      <button class="btn btn-block btn-primary" type="submit" name="Terug">Terug</button><br>
    </form>
</div>







<?php
session_start();
    $Msg ="";

  if(isset($_POST['submit'])){

    $Username = $_POST ["Username"];
    $wachtwoord = $_POST ["Wachtwoord"];

    if(empty($Username) || empty($wachtwoord)) {
      $Msg = "vul alle bij de velden in";
    }


        include 'database.php';
        $stmt = $db->prepare("SELECT idklant,Username, Wachtwoord, Beheerdid FROM klant WHERE Username = :Username ");
        $stmt ->bindValue(':Username',$Username);
        $stmt->execute();
        $results = $stmt->fetch();
        if($stmt->rowCount() == 1) {

          if(password_verify($wachtwoord, $results['Wachtwoord'])) {

            $_SESSION['Username'] = $Username;
            $_SESSION['idklant'] = $results['idklant'];
            if($results['Beheerdid'] == 1) {
              $_SESSION['blogin'] = true;
              header('Refresh: 2; beheerder.php');
              $Msg = "u bent succesvol ingelogd als beheerder "
                  . $results['Username'];
            }
            else {
              $_SESSION['klogin'] = true;
              header('Refresh: 2; klant.php');
              $Msg = "u bent succesvol ingelogd " . $results['Username'];

            }
          }
          else  {
            $Msg ="er zijn geen accounts gevonden met de username dat u invoerde";
          }
        }
        else {
              $Msg= "wachtwoorden komen niet overeen met de username";
        }



              if ($Msg != "") {
                echo '<div class="bg-dark text-danger container" id="errormes">';
                echo $Msg . "<br><br>";
                echo '</div>';
              }
              }
        ?>
    </body>
</html>
