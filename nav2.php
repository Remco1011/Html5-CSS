<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="beheerder.php"> Home</a>
    </li>
      <ul class="navbar-nav">
      <li class="dropdown"><a class="nav-link" data-toggle="dropdown" href="#">Informatie vragen <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="muteer_klant.php">Klanten</a></li>
          <li><a href="muteer_begeleider.php">alle begeleiders</a></li>
          <li><a href="muteer_deelnemers.php">alle deelnemers</a></li>
          <li><a href="casus4.php">deelnemers per run</a></li>
          <li><a href="muteer_runs.php">onze runs</a></li>
        <li><a href="casus10.php">succesvolste runs</a></li>
          </ul>
        </ul>
    <ul>
    <form class="form-inline" action="beheer_zoek.php" method="post">
    <input class="form-control mr-sm-2" name="zoek" type="text" placeholder="Zoek">
    <button class="btn btn-success  my-2 mr-sm-2" type="submit" name="submit">Zoek</button>
  </form>
    </ul>
    <ul>


<form action="profiel.php"  method="post">
 <li> <button class="btn btn-success btn my-2 mr-sm-2" name="zoek" type="text"> <?php echo $_SESSION ['Username'];?> </button></li>
        </form>
      </ul>



<form method="post">
<li> <button class="btn btn-success btn my-2 mr-sm-2"  name="loguit"> Log uit</button></li>
</form>

<?php
if(isset($_POST['loguit'])) {
session_start();
$_SESSION = array();
session_destroy();
header('Location: home.php');
exit();
}
?>

  </ul>

</nav>
