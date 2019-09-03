<?php
session_start();
require 'database.php';
if($_SESSION['klogin'] == false) {
    header("Location: inlog.php");
    exit();
  }

?>

<!DOCTYPE html>
<html lang="nl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wachtwoord aanpassen</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<link id="pagestyle" rel="stylesheet" href="Regristratie.css">
    	<link rel="icon" href="images/asics.png">
    </script>
  </head>
  <body>


    <header class="Banner"> <h1>Wachtwoord wijzigen</h1></header>

<div class="Formw">


<form class="" method="post">


      <div class="container">
    <label>Oud wachtwoord</label>
    <br>
    <div class="col-sm-12">
    <input class="form-control" type="password" name="Owoord">
      </div>
    <label>Nieuw wachtwoord</label>
    <br>
        <div class="col-sm-12">
    <input class="form-control" type="password" name="Nwoord">
    </div>
    <label>Confirm wachtwoord</label>
    <br>
    <div class="col-sm-12">
    <input class="form-control" type="password"  name="Cwoord">
  </div>

<br>
    <button class="btn btn-block btn-primary" type="submit" name="submit">wachtwoord wijzigen</button><br>





</div>


    </form>
    <div class="container">
      <form action="klant.php" method="post">
      <button class="btn btn-block btn-primary" type="submit" name="submit">Terug</button><br>
    </div>


    </form>
  </div>
</div>

  <?php
    $msg = "";

if(isset($_POST['submit'])) {
  $oww = $_POST['Owoord'];
  $ww1 = $_POST['Nwoord'];
  $ww2 = $_POST['Cwoord'];
if($ww1 == $ww2){
  $idklant = $_SESSION['idklant'];
  $squery = "SELECT Wachtwoord FROM klant WHERE idklant = :idklant";
  $ostmt = $db->prepare($squery);
  $ostmt->BindValue(':idklant', $idklant);
  $ostmt->execute();
  $data = $ostmt->fetch();
if (password_verify($oww,$data['Wachtwoord'])) {
  $ww=password_hash($ww1, PASSWORD_DEFAULT);
  $squery = "UPDATE klant SET Wachtwoord = :Wachtwoord WHERE idklant = :idklant";
  $ostmt = $db->prepare($squery);
  $ostmt->BindValue(':idklant', $_SESSION['idklant']);
  $ostmt->BindValue(':Wachtwoord', $ww);
  $ostmt->execute();
  $msg = "Uw wachtwoord is gewijzigd.";
}else{
  $msg = "het oude wachtwoord klopt niet.";
}
}else{
  $msg = "het invoeren van het nieuwe wachtwoord is misgegaan.";
}
header("Refresh: 2; profielklant.php");
}

if ($msg != "") {
  echo '<div class="bg-dark text-danger container" id="errormes">';
  echo $msg . "<br><br>";
  echo '</div>';
}

?>


  </body>
</html>
