
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="klant.php"> Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="klant_over runningcrew.php">Over ons</a>
    </li>
    <li class="nav-item">
<a class="nav-link" href="contact.php">Inschrijven</a>
</li>
<li class="nav-item">
<a class="nav-link" href="klant_onze diensten.php">Onze runs</a>
</li>
      <ul class="navbar-nav">
      <li class="dropdown"><a class="nav-link" data-toggle="dropdown" href="#">Informatie vragen <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="casus1.php">alle begeleiders</a></li>
          <li><a href="casus2.php">alle deelnemers</a></li>
          <li><a href="casus3.php"> woonplaats/deelnemers</a></li>
          <li><a href="casus5.php">onze runs</a></li>
        <li><a href="casus8.php">startlocaties runs</a></li>
        <li><a href="casus9.php">Deelnemers met meeste runs</a></li>

          </ul>
        </ul>


          <ul>


      <form action="profielklant.php"  method="post">
       <li> <button class="btn btn-success btn my-2 mr-sm-2" name="zoek" type="text"> <?php echo $_SESSION ['Username'];?> </button></li>
              </form>
            </ul>

      <form method="post">
      <li> <button class="btn btn-success btn my-2 mr-sm-2" name="loguit"> Log uit</button></li>
      </form>
      <ul>
        <form class="form-inline" action="klant_zoek.php" method="post">
        <input class="form-control mr-sm-2" name="zoek" type="text" placeholder="Zoek">
        <button class="btn btn-success  my-2 mr-sm-2" type="submit" name="submit">Zoek</button>
      </form>
        </ul>

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
