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
	
      
      <link rel="stylesheet" type="text/css" href="runningcrew-z.css">
     
 </head>
    <body>
<?php
        include"nav.php";
        include"database.php";
?>
        
        <?php
           
        $zoek = $_POST['zoek'];
        if(empty($zoek)) {
            echo "vul een voornaam in";
        }
        else {
            try{
                $squery = "SELECT voornaam, woonplaats FROM hardlopers WHERE voornaam LIKE '%$zoek%'";
                $ostmt = $db->prepare($squery);
                $ostmt->bindvalue(':hardlopers', '%$zoek%');
                $ostmt->execute();
                if($ostmt->rowcount()>0){
                    echo '<table>';
                    echo '<thead>';
                    echo '<tr>';
                    echo "<th>voornaam</th>";
                    echo "<th>woonplaats</th>";
                    echo '<tr>';
                    echo "</thead>";
                    echo "<tbody>";
                while($arow =$ostmt->fetch(PDO::FETCH_ASSOC)){
                    echo '<tr>';
                    echo "<td>" . $arow["voornaam"] . "</td>";
                    echo "<td>" . $arow["woonplaats"] . "</td>";
                    echo '<tr>';
                }
                    echo "</tbody>";
                    echo'<table>';
                }
                else{
                    echo "De naam is niet gevonden vul een andere naam in";
                } 

            }
            catch(PDOException $e){
                die("Error!: " . $e->getMessage());
            }
        }
        $db = null;
     
?>
    </body>
</html>