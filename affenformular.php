<?php
session_start();

if(isset($_GET['logout']))
{
    $_SESSION['eingeloggt'] = false;
    header("location: ./affenformular.php");
    exit;
}
?>
<!DOCTYPE html>

<html>
<head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
</head>
  <body>
    <section class="container">
      <div class="row">
        <h1>Registration</h1>
        <div class="col-md-12">
          <form action="affenformular.php" method="post">
            <input type="text" name="Benutzername" placeholder="Benutzername" class="form-control"/>
            <input type="password" name="pw" placeholder="Passwort" class="form-control"/>
            <input type="password" name="pwbest" placeholder="Passwort bestätigen" class="form-control"/>
            <input type="password" name="image" placeholder="Bild" class="form-control"/>
            <br>
            <button type="submit" name="register" value="absenden" class="form-control btn btn-primary">Absenden</Button>
          </form>
        </div>
        <div class="col-md-12">
        <br>
          <form action="" method="post">
          <input type="text" name="loginname" placeholder="Benutzername" class="form-control"/>
          <input type="password" name="loginpwd" placeholder="Passwort" class="form-control"/>
          <br>
          <button type="submit" name="login" value="Log In" class="form-control btn btn-primary">Log In</Button>
        </form>
          <?php if(@$_SESSION['eingeloggt'] == true){
            echo "<a href='affenformular.php?logout=true'>Log Out</a>";
          }
          ?>
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

        /*$sql = "SELECT * FROM benutzer_tbl";
        $abfrage = $mysqli->query($sql);
        while($row = $abfrage->fetch_object())
        {
          print_r($row);
        }*/


        if(@$_POST['login'])
        {
          $loginname = @$_POST['loginname'];
          $loginpwd = @$_POST['loginpwd'];

          $sql = $mysqli->query("SELECT * FROM benutzer_tbl WHERE Benutzername = '".$loginname."' AND Passwort = '".$loginpwd."' ");
          if($sql->num_rows > 0)
          {
            echo 'Account gefunden';
            $_SESSION['eingeloggt'] = true;
            header("location: ./affenformular.php");
            exit;
          } else {
            echo 'Keinen Account mit dieser Kombination gefunden!';
          }
        }

        if(@$_POST['register'])
        {

          $loginname = @$_POST['Benutzername'];
          $passwd = @$_POST['pw'];
          $confirm = @$_POST['pwbest'];

          $sql = $mysqli->query("SELECT * FROM benutzer_tbl WHERE Benutzername = '".$loginname."'");
          if($passwd == $confirm)
          {
              if($loginname != "")
              {
                if($sql->num_rows > 0)
                {
                  echo "Dieser Name existiert schon.";
                }
                else
                {
                  echo "Erfolgreiche Registrierung.";
                  $sql = "INSERT INTO benutzer_tbl (Benutzername, Passwort) VALUES ('".$loginname."', '".$passwd."')";
                  $mysqli->query($sql);

                  $_SESSION['eingeloggt'] = true;

                  echo "Der Eintrag war erfolgreich";
                }
              }
              else {

              }
          }
      }



          session_cache_limiter(1);


            /*if(@$_POST['Benutzername'] != "" AND @$_POST['pw'] != "")
            {
              if($_POST['Benutzername'] == "Sasha" AND @$_POST['pw'] == "123")
              {
                $_SESSION['Benutzername'] = $_POST['Benutzername'];
                $_SESSION['eingeloggt'] = true;
                echo "Anmeldung war erfolgreich";
              }
              else
              {
                echo "Eingabe ungültig";
                $_SESSION['eingeloggt'] = false;
              }
            }
            if(@$_SESSION['eingeloggt'] == true)
            {
              echo "Hallo " . $_SESSION['Benutzername'];
            }
            else
            {
              echo "Bitte melden Sie sich an";
              echo '<form action="" method="POST" >';
              echo '<p>Benutzername:<br />';
              echo '<input type="text" name="Benutzername" value="" />';
              echo '<p>Kennwort:<br />';
              echo '<input type="password" name="pw" value="" />';
              echo '<p><input type="Submit" value="einloggen" />';
              echo '</form>';

    // Programm wird hier beendet weil Benutzer nicht angemeldet ist.
              exit;
            }

            // Abfrage, ob die Variable anzahlbesuche existiert
            /*if ( ! isset ( $_SESSION['anzahlbesuche'] ) ) {
              $_SESSION['anzahlbesuche'] = 1;
            }
            else {
              $_SESSION['anzahlbesuche'] ++;
              echo $_SESSION['anzahlbesuche'];
            }*/ //Um Anzahl Besucher zu zählen



            //Teilaufgaeb
            /*if(@$_POST['pw'] == @$_POST['pwbest'])
            {
              echo "Passwort ist in Ordnung";
            }
            else
            {
              echo "Passwörter nich gleich";
            }
            if(empty(@$_POST['Benutzername']) == TRUE)
            {
              echo "Bitte geben Sie Ihren Vornamen ein.";
            }
            else
            {
              echo "Eingetragener Vorname: " . "<br>" . @$_POST['Benutzername'];
            }*/
          ?>
        </div>
      </div>
    </section>
  </body>
</html>
