<html>
  <body>
    <?php
      $x = 1;
      $teiler = 1;
      $anzahl = 0;
      while($x <= 1000)
      {
        while($teiler <= 1000)
        {
          if($x % $teiler == 0)
          {
            $anzahl++;
          }
          $teiler++;
        }
        $teiler = 1;
        if($anzahl == 2)
        {
          echo "<p>" . $x . "</p>";
        }
        $anzahl = 0;
        $x++;
      }
     ?>
  </body>
</html>
