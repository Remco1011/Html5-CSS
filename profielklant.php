<?php
session_start();
if(!isset($_SESSION['klogin']) || !$_SESSION['klogin']) {
    header("Location: inlog.php");
    exit();
  }
  ?>
<!DOCTYPE html>
<html lang="nl" dir="ltr">
  <head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title> Profiel</title>
  <link rel="stylesheet" type="text/css" href="Registratie.css">
  </head>
  <body>

    <?php
    require "database.php"
     ?>
<?php  try {
            $stmt = $db->prepare("SELECT * FROM klant WHERE idklant = :idklant");
            $stmt->bindValue(':idklant', $_SESSION['idklant']);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
          } catch (\Exception $e) {
            die("error!: " . $e->getMessage());
          }

          if(isset($_POST['wachtwoord'])) {
            header('Location: wachtwoord_klant.php');
          }
    ?>




    <header class="container-fluid banner"> <img src="running crew logo.png" height="144px" width="300px"><h1>Rotterdam Running Crew profiel bewerken</h1>
        </header>
  <form  method="post">
    <?php
      include 'nav3.php' ; ?>
      <div class="container">
    <label>Usernaam</label>
    <br>
    <div class="col-sm-12">
    <input class="form-control" type="text" value="<?php echo $result['Username']; ?>" name="Username">
      </div>
        <div class="col-sm-12">
    <input class="form-control" type="text" value="<?php echo $result['idklant']; ?>" name="idklant" hidden>
    </div>
    <label>Voornaam</label>
    <br>
        <div class="col-sm-12">
    <input class="form-control" type="text" value="<?php echo $result['voornaam']; ?>" name="voornaam">
    </div>
    <label>Achternaam</label>
    <br>
        <div class="col-sm-12">
    <input class="form-control" type="text" value="<?php echo $result['achternaam']; ?>" name="achternaam">
    <label> Woonplaats</label>
    <br>
        <div class="col-sm-12">
    <input class="form-control" type="text" value="<?php echo $result['Woonplaats']; ?>" name="Woonplaats">
    </div>
    <label>Email</label>
    <br>
    <div class="col-sm-12">
    <input class="form-control" type="email" value="<?php echo $result['Email']; ?>" name="Email">
    </div>
    <label>Geboortedatum</label>
    <br>
    <div class="col-sm-12">
    <input class="form-control" type="date" value="<?php echo $result['Geboortedatum']; ?>" name="Geboortedatum"> <br>
    </div>
    <button class="btn btn-block btn-primary" type="submit" name="submit">verder</button> <br>
  </form>
  <form class="" action="wachtwoord_klant.php" method="post">
    <button class="btn btn-block btn-primary" type="submit" name="wachtwoord">wachtwoord wijzigen</button><br>
  </form>
</div>
<?php

  if(isset($_POST['submit'])) {
    include 'database.php';
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $Username = $_POST['Username'];
    $email = $_POST['Email'];
    $idklant = $_POST['idklant'];
    $woonplaats = $_POST ['Woonplaats'] ;
    $gebdatum = $_POST ['Geboortedatum'] ;

  $query ="UPDATE klant SET voornaam = :voornaam, achternaam = :achternaam, Username = :Username,  Email = :Email, Woonplaats = :Woonplaats, Geboortedatum= :Geboortedatum WHERE idklant LIKE :idklant";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':voornaam', $voornaam);
    $stmt->bindValue(':achternaam', $achternaam);
    $stmt->bindValue(':Username', $Username);
    $stmt->bindValue(':Email', $email);
    $stmt->bindValue(':Woonplaats', $woonplaats);
    $stmt->bindValue(':idklant', $idklant);
    $stmt->bindValue(':Geboortedatum', $gebdatum);
    $results = $stmt->fetch();
    $stmt->execute();


header('Refresh: 0; url=profielklant.php');



}


   ?>

</section>
</main>
</body>
</html>
