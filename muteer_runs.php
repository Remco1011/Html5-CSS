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
echo '<div class="container"><div class="row"><h1>Runs</h1>';
try {
    if (isset($_POST["Wijzig"])) {
        $query = $db->prepare("UPDATE runs SET idrun = :idrun, naam = :naam, begin_locatie = :begin_locatie, eind_locatie  = :eind_locatie
WHERE idrun = :idrun");
        $query->bindValue(':idrun', $_POST['idrun']);
        $query->bindValue(':naam', $_POST['naam']);
          $query->bindValue(':begin_locatie', $_POST['begin_locatie']);
        $query->bindValue(':eind_locatie', $_POST['eind_locatie']);
          $query->execute();

    }
    if (isset($_POST["Wis"]))
    {
        $query = $db->prepare("DELETE FROM runs WHERE idrun = :idrun");
        $query->bindValue(':idrun', $_POST['idrun']);
        $query->execute();
    }
    if (isset($_POST["Nieuw"])) {
        $query = $db->prepare("INSERT INTO runs (idrun, naam, begin_locatie, eind_locatie) VALUES(:idrun, :naam, :begin_locatie, :eind_locatie)");
        $query->bindValue(':idrun', $_POST['idrun']);
        $query->bindValue(':naam', $_POST['naam']);
        $query->bindValue(':begin_locatie', $_POST['begin_locatie']);
        $query->bindValue(':eind_locatie', $_POST['eind_locatie']);
        $query->execute();
    }
    $query = $db->prepare("SELECT * FROM runs");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    echo "<div class='container'>";
    echo "<table class='table' border='1'>";
    echo "<TD>idruns</TD>
    <TD>naam</TD>
    <TD>begin_locatie</TD>
    <TD> eind_locatie</TD>
    <TD>Wijzigen</TD>
    <TD colspan='2'>Wissen</TD>
    </thead>";

    foreach ($result as $rij) {
        ?>
        <form method="post" action="muteer_runs.php">
            <tr>
                <td><?php echo($rij['idrun']); ?><input type="hidden" name="idrun" value="<?php echo($rij['idrun']); ?>"></td>
                <td><input type="text" name="naam" value="<?php echo($rij['naam']); ?>"></td>
                <td><input type="text" name="begin_locatie" value="<?php echo($rij['begin_locatie']); ?>"></td>
                <td><input type="text" name="eind_locatie" value="<?php echo($rij['eind_locatie']); ?>"></td>
                <td><input type="submit" name="Wijzig" value="Wijzig"></td>
                <td><input type="submit" name="Wis" value="Wis"
                           onclick="return confirm('<?php echo($rij['idrun']); ?> wordt verwijderd. Weet u het zeker?')">
                </td>

            </tr>
        </form>
        <?php
    }
    ?>

    <form method="post" action="muteer_runs.php">
        <tr>
            <td><input type="text" name="idrun" value="" required></td>
            <td><input type="text" name="naam" value="" required></td>
            <td><input type="text" name="begin_locatie" value="" required></td>
            <td><input type="text" name="eind_locatie" value="" required></td>
            <td colspan="2"><input type="submit" name="Nieuw" value="Nieuw"></td>
        </tr>
    </form>
    </div>
    <br/>
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
