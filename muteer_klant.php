<?php
session_start();
if($_SESSION['blogin'] == false) {
    header("Location: inlog.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Runs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=devide-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="htpps://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="muteercss.css">
</head>
<body>
<?php
require 'database.php';
echo '<div class="container"><div class="row"><h1>Klant</h1>';
try {
    if (isset($_POST["Wijzig"])) {
        $query = $db->prepare("UPDATE klant SET idklant = :idklant, Beheerdid = :Beheerdid, Username = :Username, Woonplaats = :Woonplaats
WHERE idklant = :idklant");
        $query->bindValue(':idklant', $_POST['idklant']);
        $query->bindValue(':Beheerdid', $_POST['Beheerdid']);
          $query->bindValue(':Username', $_POST['Username']);
        $query->bindValue(':Woonplaats', $_POST['Woonplaats']);
          $query->execute();

    }
    if (isset($_POST["Wis"]))
    {
        $query = $db->prepare("DELETE FROM klant WHERE idklant = :idklant");
        $query->bindValue(':idklant', $_POST['idklant']);
        $query->execute();
    }
    if (isset($_POST["Nieuw"])) {
        $query = $db->prepare("INSERT INTO klant (idklant, Beheerdid, Username, Woonplaats) VALUES(;idklant, ;Beheerdid, ;Username, ;Wsoonplaats)");
        $query->bindValue(':idklant', $_POST['idklant']);
        $query->bindValue(':Beheerdid', $_POST['Beheerdid']);
        $query->bindValue(':Username', $_POST['Username']);
        $query->bindValue(':Woonplaats', $_POST['Woonplaats']);
        $query->execute();
    }
    $query = $db->prepare("SELECT * FROM klant");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    echo "<div class='container'>";
    echo "<table class='table' border='1'>";
    echo "<TD>idklant</TD>
    <TD>Beheerdid</TD>
    <TD>Username</TD>
    <TD>Woonplaats</TD>
    <TD>Wijzigen</TD>
    <TD colspan='2'>Wissen</TD>
    </thead>";

    foreach ($result as $rij) {
        ?>




                <form method="post" action="muteer_klant.php">
                  <tr>
              <td><?php echo($rij['idklant']); ?><input type="hidden" name="idklant" value="<?php echo($rij['idklant']); ?>"></td>
              <td><input type="text" name="Beheerdid" value="<?php echo($rij['Beheerdid']); ?>"></td>
              <td><input type="text" name="Username" value="<?php echo($rij['Username']); ?>"></td>
              <td><input type="text" name="Woonplaats" value="<?php echo($rij['Woonplaats']); ?>"></td>
              <?php if ($rij['Beheerdid']== 0): ?>
                <td><input type="submit" name="Wijzig" value="Wijzig"></td>
                <td><input type="submit" name="Wis" value="Wis"
                 onclick="return confirm('<?php echo($rij['idklant']); ?> wordt verwijderd. Weet u het zeker?')">
              <?php endif; ?>


            </tr>
        </form>
        <?php
      }
      ?>

        <form method="post" action="muteer_klant.php">
            <tr>
                <td><input type="text" name="idklant" value="" required></td>
                <td><input type="text" name="Beheerdid" value="" required></td>
                <td><input type="text" name="Username" value="" required></td>
                <td><input type="text" name="Woonplaats" value="" required></td>
                <td colspan="2"><input type="submit" name="Nieuw" value="Nieuw"></td>
            </tr>
        </form>
        </div>
      </br>

    <?php
  }
catch(PDOException $e)
{
    $sMsg = '<p>
regelnummer: '.$e->getLine().'<br />
bestand: '.$e->getFile().'<br />
Foutmelding: '.$e->getMessage().'
</p>';

    trigger_error($sMsg);
}

$db=NULL;
?>

</body>
</html>
