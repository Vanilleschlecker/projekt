<html>
<head>
  <script
  src="https://code.jquery.com/jquery-3.1.1.js"
  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
  crossorigin="anonymous"></script>
  <script src="script.js"></script>
  <link href="style.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
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

$sql = $mysqli->query("SELECT * FROM benutzer_tbl");
echo "<table class='table table-striped table-hover'>";
echo "<tr>";
echo "<td>Benutzername</td>";
echo "<td>Mag Frauen</td>";
echo "<td>Selectlist</td>";
echo "<td>Delete Button</td>";
echo "<td>Edit Button</td>";
while($row = $sql->fetch_object())
{
  echo "<div>";
echo "<tr id=\"".$row->Benutzername."\">";
echo "<td>".$row->Benutzername.'</td>';
//echo 'Nachname: '.$row->password.'<br>';
echo "<td>".$row->MagFrauen.'</td>';
echo "<td>".$row->selectlist.'</td>';
echo "<td>";
echo "<Button type='button' onclick='deleteCustomer(\"".$row->Benutzername."\");'>";
echo "<i class='fa fa-print' aria-hidden='true'>";
echo "</i>";
echo "</button>";
echo "</td>";
echo "<td>";
echo "<Button type='button' onclick='deleteCustomer(\"".$row->Benutzername."\");'>";
echo "<i class='fa fa-space-shuttle' aria-hidden='true'>";
echo "</i>";
echo "</button>";
echo "</td>";
echo "</tr>";
echo "</div>";
}
echo "</table>";

?>
</html>
