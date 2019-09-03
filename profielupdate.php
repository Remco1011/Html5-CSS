<?php
session_start();
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
        header('Location: wachtwoord.php');
      }
?>




<?php

      if(isset($_POST['submit'])) {
        include 'database.php';
        $voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $Username = $_POST['Username'];
        $email = $_POST['Email'];
        $idklant = $_POST['idklant'];
        $woonplaats = $_POST ['Woonplaats'] ;
        $gebdatum = $_POST ['Geboortedatum '] ;

      $query ="UPDATE klant SET voornaam = :voornaam, achternaam = :achternaam, Username = :Username,  Email = :Email, Woonplaats = :Woonplaats Geboortedatum= :Geboortedatum WHERE idklant LIKE :idklant";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':voornaam', $voornaam);
        $stmt->bindValue(':achternaam', $achternaam);
        $stmt->bindValue(':Username', $Username);
        $stmt->bindValue(':Email', $email);
        $stmt->bindValue(':Woonplaats', $woonplaats);
        $stmt->bindValue(':idklant', $idklant);
        $stmt->bindValue(':Geboortedatum', $gebdatum);
        $stmt->execute();

        header('Refresh: 5; profiel.php');
      }
       ?>
