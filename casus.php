<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8">
    <title> Rotterdam Running Crew</title>
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
  <link rel="stylesheet" type="text/css" href="runningcrew-z.css">


 </head>
    <body>
    <?php
        include 'navigatie.php';
        include 'database.php' ;

        ?>

           <div class="container row">
    <h2 class="kop"> Begeleiders </h2>
    <h3 class="kop">  De Begeleiders</h3>


    <?php



$zoek=$_POST['zoek'];
try{
$sQuery = "SELECT voornaam AS voornaam, tussenvoegsel AS tussenvoegsel, achternaam AS achternaam
			FROM begeleiders
    Where woonplaats like :begeleiders"
     = $db->prepare($sQuery);
			$oStmt->bindValue('Begeleiders:', "%$zoek%");
			$oStmt->execute();
    	if($oStmt->rowCount()>0)
			{
					echo '<table class="table table-bordered table-hover tkop">';
					echo '<thead>';
					echo '<td> Begeleiders</td>';
					echo '</thead>';
				while($aRow = $oStmt->fetch(PDO::FETCH_ASSOC))
               {
					echo '<tr>';
					echo '<td>'.$aRow[' voornaam, tussenvoegsel, achternaam'].'</td>';
					echo '</tr>';
				}
				echo '</table>';

    }
			else
			{
				echo 'Helaas, geen gegevens bekend';
			}
             }
               catch(PDOException $e)
		{
			$sMsg = '<p>
					Regelnummer: '.$e->getLine().'<br />
					Bestand: '.$e->getFile().'<br />
					Foutmelding: '.$e->getMessage().'
				</p>';

			trigger_error($sMsg);
		}
		$db = null;

?>

    </div>

    </body>
</html
