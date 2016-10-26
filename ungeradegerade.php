<html>
<body>

<table>
  <tr>
    <td>
      <?php
        $geradeunge = 0;
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
