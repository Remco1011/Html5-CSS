<?php
if(!isset($_SESSION['blogin'])|| $_SESSION['blogin'] ==false )
{
  
header(string:'Location: inlog.php');
exit();

}
