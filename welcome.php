<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    	<link id="pagestyle" rel="stylesheet" href="runningcrew-z.css">
    	<link rel="icon" href="images/asics.png">
    </script>
    <link rel="stylesheet" href="regristratie.php">
    <title> Welkom</title>
  </head>
  <body>



<?php
        require "database.php" ;

     ?>
<?php


      if(isset($_POST["registreer"])) {
      $Username= $_POST['Username'] ;
      $voornaam= $_POST['voornaam'] ;
      $achternaam= $_POST['achternaam'] ;
      $email= $_POST[ 'Email'] ;
      $woonplaats=$_POST['woonplaats'] ;
      $Gebdatum=$_POST ['Geboortedatum'];
      $wachtwoord= $_POST['Wachtwoord'] ;
      $wachtwoord2= $_POST['Wachtwoord2'] ;
      }
      if (empty($Username) || empty($voornaam)|| empty($achternaam) || empty($email)|| empty($woonplaats)|| empty($Gebdatum)|| empty($wachtwoord)|| empty($wachtwoord2)){
      echo" U moet alle gegevens invullen";
      }
      else {
      $sql = $db->prepare("SELECT * FROM klant WHERE Username= '$Username'");
      $sql->execute();
      if($sql->rowCount() > 0){
      echo"de Username is al in gebruik";
      }
      elseif ($wachtwoord != $wachtwoord2) {
      echo "Uw wachtwoorden zijn niet gelijk aan elkaar" ;
      }

      else  {
      $ww=password_hash($wachtwoord, PASSWORD_DEFAULT);

        try{
  $squery = "INSERT INTO klant (Username, voornaam, achternaam, Geboortedatum, woonplaats, Email, wachtwoord) VALUES( :Username, :voornaam, :achternaam, :Geboortedatum, :woonplaats, :Email,:Wachtwoord)";
            $query= $db-> prepare($squery) ;
    $query->bindValue(':Username', $_POST['Username']);
    $query->bindValue(':voornaam', $_POST['voornaam']);
    $query->bindValue(':achternaam', $_POST['achternaam']);
    $query->bindValue(':Geboortedatum', $_POST['Geboortedatum']);
    $query->bindValue(':woonplaats',$_POST['woonplaats']);
    $query->bindValue(':Email', $_POST['Email']);
    $query->bindValue(':Wachtwoord', $ww);
      echo"U bent succesvol geregistreerd";
        $query-> execute();}
              catch(PDOException $e){
          die("Error!: " . $e->getMessage());

      }
      }
      }





 ?>

 <form class="" action="home.php" method="post">
   <button class="btn btn-block btn-primary" type="submit" name="Verder">Verder</button><br>
 </form>

    </body>
</html>
