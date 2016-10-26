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
      ?>
    </body>
</html>
