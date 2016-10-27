
<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "seshe";

  // Create connection

$mysqli = new mysqli($servername, $username, $password, $dbname, 3306);
if($mysqli->connect_errno)
{
  echo 'Datenbankverbindung fehlerhaft!';
  exit;
}

$sql = $mysqli->query("SELECT * FROM tabelle");
while($row = $sql->fetch_object())
{
echo 'Vorname: '.$row->Vorname.'<br>';
echo 'Nachname: '.$row->Nachname.'<br>';
echo 'Geburtstag: '.$row->Geburtstag.'<br>';
echo 'Lieblingsfarbe: '.$row->Lieblingsfarbe.'<br>';
}

?>
