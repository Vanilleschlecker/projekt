<html>
  <body>
    <?php
    $arr = array("Eins", "Zwei");
    natsort($arr);
    print_r($arr);
    sort($arr);
    print_r($arr);
    arsort($arr);
    print_r($arr);
    asort($arr);
    print_r($arr);
    echo count($arr);

    $key = array_search("Eins", $arr);
    echo $key;


    $text = "Freude schöner Götterfunken,
Tochter aus Elysium,
Wir betreten Feuertrunken,
Himmlische, dein Heiligtum!
Deine Zauber binden wieder,
Was die Mode streng geteilt.
Alle Menschen werden Brüder,
Wo dein sanfter Flügel weilt.";

echo "<b>ohne nl2br():</b><br />\n";
echo $text;

?>

<br />
<br />
<?php

echo "<b>mit nl2br():</b><br />\n";
echo nl2br($text);
     ?>

  </body>
</html>
