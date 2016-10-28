<?php
session_start();

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

if(isset($_GET['logout']))
{
    $_SESSION['eingeloggt'] = false;
    header("location: ./affenformular.php");
    exit;
}
?>
<!DOCTYPE html>

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
  <body>
    <section class="container">
      <div class="row">
        <h1>Registration</h1>
        <div class="col-md-12">
          <form action="affenformular.php" method="post" enctype="multipart/form-data" id="myform">
            <button value="lelelel" type="button" onclick="getConfirmation(this.value)"><i class="fa fa-comment" aria-hidden="true"></i></button>
            <input id="username" type="text" name="Benutzername" placeholder="Benutzername" class="form-control"/>
            <input class="form-control username" value="88">
            <input type="password" name="pw" placeholder="Passwort" class="form-control password"/>
            <input type="password" name="pwbest" placeholder="Passwort bestätigen" class="form-control"/>
            <input id="input-1" name="image" type="file" class="file" required>
            <textarea placeholder="Notizen" name="note" class="form-control note" rows="5" id="comment"></textarea>
            <label class="radio-inline"><input type="radio" value="1" name="optradio">Option 1</label>
            <label class="radio-inline"><input type="radio" value="2" name="optradio">Option 2</label>
            <label class="radio-inline"><input type="radio" value="3" name="optradio">Option 3</label>
            <br>
            <label class="checkbox-inline"><input name="ch1" type="checkbox">Mag Männer</label>
            <label class="checkbox-inline"><input name="ch2" type="checkbox">Mag Frauen</label>
            <label class="checkbox-inline"><input name="ch3" type="checkbox">Mag Kinder</label>
            <div class="form-group">
              <label for="sel1">Select list:</label>
              <i class="fa fa-book"></i>
              <select name="selectlist" class="form-control" id="sel1">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>
            <input type="number" name="number" min="1" max="99" placeholder="Alter">
            <input type="email" name="email" placeholder="E-Mail">

            <br>
            <input id="test" type="reset" class="hidden">
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
            echo @$_SESSION['username'];
            $sql = $mysqli->query("SELECT * FROM benutzer_tbl WHERE Benutzername = '".$_SESSION['username']."' ");
            if($sql->num_rows > 0)
            {
              $user = $sql->fetch_object();
              if($user->Image)
              {
                  echo "<img src='./images/".$user->Image."'>'";
              }

            } else {
              echo 'KEIN USERACCOUNT GEFUNDEN, HACK??!';
            }
          }
          ?>
          <?php
          /*required*/ //Um ein Feld als notwendig machen um anzumelden

        /*$sql = "SELECT * FROM benutzer_tbl";
        $abfrage = $mysqli->query($sql);
        while($row = $abfrage->fetch_object())s
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
            $row = $sql->fetch_object();
            $_SESSION['username'] = $row->Benutzername;
            $_SESSION['passwort'] = $row->Passwort;
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
          $radio = @$_POST['optradio'];
          $ch1 = @$_POST['ch1'];
          $ch2 = @$_POST['ch2'];
          $ch3 = @$_POST['ch3'];
          $selectlist = @$_POST['selectlist'];
          $number = @$_POST['number'];
          $mail = @$_POST['email'];
          $note = @$_POST['note'];

          if($ch1 == true)
          {
            $ch1 = 1;
          }
          else
          {
            $ch1 = 0;
          }
          if($ch2 == true)
          {
            $ch2 = 1;
          }
          else
          {
            $ch2 = 0;
          }
          if($ch3 == true)
          {
            $ch3 = 1;
          }
          else
          {
            $ch3 = 0;
          }

          $sql = $mysqli->query("SELECT * FROM benutzer_tbl WHERE Benutzername = '".$loginname."'");
          if($passwd == $confirm)
          {
            print_r(@$_FILES);

              if($loginname != "")
              {
                if($sql->num_rows > 0)
                {
                  echo "Dieser Name existiert schon.";
                }
                else
                {
                  echo "Erfolgreiche Registrierung.";
                  $mysqli->query("INSERT INTO benutzer_tbl (Benutzername, Passwort, Image, radio, MagMaenner, MagFrauen, MagKinder, selectlist, num, email, note) VALUES ('".$loginname."', '".$passwd."', 'image_".$loginname.".png', '".$radio."', '".$ch1."', '".$ch2."', '".$ch3."', '".$selectlist."', '".$number."', '".$mail."', '".$note."')");
                  copy($_FILES["image"]["tmp_name"], "./images/image_".$loginname.".png");

                  print_r($mysqli);
                  echo "Der Eintrag war erfolgreich";
                }
              }
              else {

              }
          }
      }

        $sql = "SELECT * FROM benutzer_tbl";
        $result = $mysqli->query($sql);

        while ($row = $result->fetch_assoc())
        {
          echo $row['Benutzername'];
        }

        /*$sql = $mysqli->query("SELECT * FROM benutzer_tbl");
        while($row = $sql->fetch_object())
        {
          if($row->Image != "")
          {
              echo "<img src='./images/".$row->Image."'>'";
          }

        }*/



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
