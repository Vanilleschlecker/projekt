<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "benutzer";

// Create connection

$mysqli = new mysqli($servername, $username, $password, $dbname, 3306);
if($mysqli->connect_errno)
{
echo 'Datenbankverbindung fehlerhaft!';
exit;
}

$id = $_GET['customer'];

$sql = $mysqli->query("DELETE FROM benutzer_tbl WHERE Benutzername = '".$id."'");

  if($mysqli->query($sql) == TRUE)
  {
    echo 1;
  }
  else {
    echo 0;
  }

 ?>
