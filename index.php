<html>
  <body>
      <?php
        $name = '<p>Sasha</p>';
        $alter = 99;
        echo $name;
        echo $alter;

        //rechnen

        $a = 5;
        $b = 4;

        $c = $a * $b;

        echo '<p>' . $c . '</p>';
        $stunde = date("H");
        if ($stunde < 10) echo "Guten Morgen";

        elseif ($stunde >= 10 and $stunde < 18) echo "Guten Tag";

        elseif ($stunde >= 18) echo "Guten Abend";

        if($stunde < 10)
        {
          echo "Guten Morgen";
          echo "Ich liebe dich";
        }
        elseif($stunde > 10)
        {
          echo "<p>Guten Tag</p>";
          echo "Es ist " . $stunde . "Uhr. Ich liebe dich.";
        }

        //Switch case bedingungen

        $sv = 3;

        switch($sv)
        {
          case 2:
            echo "<p>WOOOOW</p>";
            echo "<p>Hast du gut gemacht</p>";
            break;
          case 3:
            echo "<p>WOOOOW</p>";
            echo "<p>Hast du gut gemacht mit der 3</p>";
            break;
        }

        //for do while schleifen

        for($x = 0; $x <=10; $x++)
        {
          $x_quadrat = $x * $x;     /* ein wenig Gerechne: * ist das Multiplikationszeichen */

          echo "Das Quadrat von " . $x . " ist: ";
          echo $x_quadrat;

          echo "<br />\n";

        }

        $x = 0;
        do
        {
          $x_quadrat = $x * $x;     /* ein wenig Gerechne: * ist das Multiplikationszeichen */

          echo "Das Quadrat von " . $x . " ist: ";
          echo $x_quadrat;

          echo "<br />\n";
          $x++;

        }while($x <= 10);

        $x = 0;
        while($x <= 10)
        {
          $x_quadrat = $x * $x;

          echo "Das Quadrat von " . $x . " ist: ";
          echo $x_quadrat;

          echo "<br />\n";
          $x++;
        }

        //gerade ungerade Zahlen

        $geradeunge = 0;



      ?>

      <table>
        <tr>
          <td>
            <?php
            while($geradeunge <= 1000)
            {
              if($geradeunge % 2 == 0)
              {
                echo "<p>" . $geradeunge . "</p>";
              }

              $geradeunge++;
            }
            ?>
          </td>

        <td>

            <?php
            $geradeunge = 0;
            while($geradeunge <= 1000)
            {
              if($geradeunge % 2 != 0)
              {
                echo "<p>" . $geradeunge . "</p>";
              }

              $geradeunge++;
            }
            ?>
          </td>
        </tr>
      </table>
    </body>
</html>
