<?php
session_start();
if($_SESSION['klogin'] == false) {
    header("Location: inlog.php");
    exit();
  }
  ?>

<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8">
    <title> Rotterdam Running Crew beheer</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="runningcrew-z.css">
	<link rel="icon" href="images/asics.png">


 </head>
    <body>
    <header class="container-fluid banner"> <img src="running crew logo.png" height="144px" width="300px"><h1>Rotterdam Running Crew klant</h1>
        </header>


<?php
        include 'nav3.php' ;

        ?>
         <div class="container row">

      <div class="col-12  col-lg-8 ruimte1">
        <section>
            <h2 class="kop"> Rotterdam Runnig crew</h2>
            </section>


        <p> Goede dag hardloop liefhebbers en welkom op de website van de Rotterdam running crew. Wij zijn een open hardloopclub waar iedere hardloper, beginnend en gevorderd, zich gratis kan aansluiten.
Mensen in beweging brengen en houden. Dat willen we! En dat lukt door samen één keer per maand dwars door bijzondere plekken van Rotterdam te rennen. Opgeroepen via social media.
We hebben altijd drie afstanden: 3, 6 en 9 kilometer zodat er voor iedereen een mooie run te lopen is. Op deze website van ons kunt u nog meer informatie vinden over ons. En kunt u alvast inschrijven voor de volgende run  <br><img src="hardlopers.jpg" width="95%"> <br> <img src="hardlopers2.jpg" width="95%">
          </p>


          </div>



        <div class="d-none d-lg-block col-lg-4">


                      <img src="running crew logo2.png">

            </div>
          </div>

    <footer class= "container">
		<button onclick="swapStyleSheet('runningcrew-z.css')">Zakelijk</button>
		<button onclick="swapStyleSheet('runnigcrew-k.css')">Kleurig</button>
	</footer>




    </body>
</html>
