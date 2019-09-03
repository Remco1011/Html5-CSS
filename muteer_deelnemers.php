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
    <title>Deelnemers</title>
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
echo '<div class="container"><div class="row"><h1>Deelnemers</h1>';
try {
    if (isset($_POST["Wijzig"])) {
        $query = $db->prepare("UPDATE hardlopers SET idhardlopers = :idhardlopers, voornaam = :voornaam, tussenvoegsel = :tussenvoegsel, achternaam = :achternaam
WHERE idhardlopers = :idhardlopers");
        $query->bindValue(':idhardlopers', $_POST['idhardlopers']);
        $query->bindValue(':voornaam', $_POST['voornaam']);
        $query->bindValue(':tussenvoegsel', $_POST['tussenvoegsel']);
        $query->bindValue(':achternaam', $_POST['achternaam']);
        $query->execute();
    }
    if (isset($_POST["Wis"]))
    {
        $query = $db->prepare("DELETE FROM hardlopers WHERE idhardlopers = :idhardlopers");
        $query->bindValue(':idhardlopers', $_POST['idhardlopers']);
        $query->execute();
    }
    if (isset($_POST["Nieuw"])) {
        $query = $db->prepare("INSERT INTO hardlopers (idhardlopers, voornaam, tussenvoegsel, achternaam) VALUES (:idhardlopers, :voornaam, :tussenvoegsel, :achternaam)");
        $query->bindValue(':idhardlopers', $_POST['idhardlopers']);
        $query->bindValue(':voornaam', $_POST['voornaam']);
        $query->bindValue(':tussenvoegsel', $_POST['tussenvoegsel']);
        $query->bindValue(':achternaam', $_POST['achternaam']);
        $query->execute();
    }
    $query = $db->prepare("SELECT * FROM hardlopers");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    echo "<div class='container'>";
    echo "<table class='table' border='1'>";
    echo "<TD>idhardlopers</TD>
    <TD>voornaam</TD>
    <TD>tussenvoegsel</TD>
    <TD> achternaam</TD>
    <TD>Wijzigen</TD>
    <TD colspan='2'>Wissen</TD>
    </thead>";

    foreach ($result as $rij) {
        ?>
        <form method="post" action="muteer_deelnemers.php">
            <tr>
                <td><?php echo($rij['idhardlopers']); ?><input type="hidden" name="idhardlopers" value="<?php echo($rij['idhardlopers']); ?>"></td>
                <td><input type="text" name="voornaam" value="<?php echo($rij['voornaam']); ?>"></td>
                <td><input type="text" name="tussenvoegsel" value="<?php echo($rij['tussenvoegsel']); ?>"></td>
                <td><input type="text" name="achternaam" value="<?php echo($rij['achternaam']); ?>"></td>
                <td><input type="submit" name="Wijzig" value="Wijzig"></td>
                <td><input type="submit" name="Wis" value="Wis"
                           onclick="return confirm('<?php echo($rij['idhardlopers']); ?> wordt verwijderd. Weet u het zeker?')">
                </td>

            </tr>
        </form>
        <?php
    }
    ?>

    <form method="post" action="muteer_deelnemers.php">
        <tr>
            <td><input type="text" name="idhardlopers" value="" required></td>
            <td><input type="text" name="voornaam" value="" required></td>
            <td><input type="text" name="tussenvoegsel" value=""></td>
            <td><input type="text" name="achternaam" value="" required></td>
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
