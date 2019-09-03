<?php session_start(); ?>
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
        include 'nav3.php';
        require 'database.php' ;

        ?>

           <div class="container row">
    <h2 class="kop"> Muteer Begeleiders </h2>
    <h3 class="kop">  Muteer Begeleiders</h3>


    <?php




try{

$sQuery = "SELECT voornaam AS voornaam, tussenvoegsel AS tussenvoegsel, achternaam AS achternaam
			FROM begeleider";
    $oStmt = $db->prepare($sQuery);
    $oStmt->execute();

    if($oStmt->rowCount()>0)
    {
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<td>Voornaam</td>";
            echo "<td>tussenvoegsel</td>";
            echo "<td>achternaam</td>";
            echo "</tr>";
            echo "</thead>";


           while($aRow = $oStmt->fetch(PDO::FETCH_ASSOC))
           {    echo "<tr>";
                echo "<td>" . $aRow["voornaam"] . "</td>";
                echo "<td>" . $aRow["tussenvoegsel"] . "</td>";
                echo "<td>" . $aRow["achternaam"] . "</td>" ;
                echo "</tr>";



                }
        echo "</table>";
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
