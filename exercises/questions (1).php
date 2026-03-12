  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>

  <body>
    <table border="1" cellspacing="0px" cellpadding="0px">

      <?php


      for ($i = 1; $i <= 5; $i++) {
        for ($j = 1; $j <= $i; $j++) {
          echo "*";
        }
        echo '</br>';
      }


      for ($i = 1; $i <= 5; $i++) {
        for ($j = 1; $j <= $i; $j++) {
          echo "*";
        }
        echo '</br>';
      }
      for ($i = 5; $i >= 1; $i--) {
        for ($j = 1; $j <= $i; $j++) {
          echo '*';
        }
        echo '</br>';
      }




      $factorial = 1;
      $num = 4;
      for ($i = 1; $i <= $num; $i++) {
        $factorial = $factorial * $i;
      };
      echo "The factorial of a number is = $factorial</br>\n\n";


      for ($i = 0; $i <= 99; $i++) {

        echo str_pad($i, 2, '0', STR_PAD_LEFT);

        if ($i <= 99) {
          echo ",";
        }
        if (($i + 1) % 20 == 0) {
          echo "<br>";
        }
      };


      for ($i = 1; $i <= 5; ++$i) {
        echo '<tr>';
        for ($j = 1; $j <= 10; ++$j) {
          echo " <td>$j * $i =" . $j * $i . '<td>';
        };
        echo '</tr>';
      };

      ?>






























      <!--
<table border="1" cellspacing="0px" cellpadding="0px";
      
   /*
  for ($i = 1; $i <= 5; $i++) {
      for ($j = 1; $j <= $i; $j++) {
        echo "*";
      }
      echo '</br>';
    }

  echo'============================================================</br>'; 

    for ($i = 1; $i <= 5; $i++) {
      for ($j = 1; $j <= $i; $j++) {
        echo "*";
      }
      echo '</br>';
    }
    for ($i = 5; $i >= 1; $i--) {
      for ($j = 1; $j <= $i; $j++) {
        echo '*';
      }
      echo '</br>';
    }
    
  echo'============================================================</br>'; 
  /*
    $number stores the value whose factorial is required.
    $factorial starts at 1 because factorial multiplication begins from 1.
    The for loop multiplies $factorial by each integer from 1 up to $number.
    For 4, the result is 4 × 3 × 2 × 1 = 24.*/


    $factorial = 1;
    $num = 4;
    for ($i = 1; $i <= $num; $i++) {
      $factorial = $factorial * $i;
    };
    echo "The factorial of a number is = $factorial";
  
      echo'============================================================</br>';

    $factorial = 1;
    $num = 4;
    for ($i = $num; $i >= 1; $i--) {
      $factorial = $factorial * $i;
    };
    echo "The factorial of a number is = $factorial";
  
  echo'============================================================</br>';

      /*
    $i the number ot format
    2 desired total length of the output
    '0' character used for padding or adding to the fornt 0f one digit

    STR_PAD_LEFT add padding to the left side


    If $i has 1 digit, a 0 is added to the left
    If $i already has 2 digits, nothing is added
    */
  echo'============================================================</br>';

    for ($i = 0; $i <= 99; $i++) {
      //str_pad(string $string, int $length, string $pad_string = " ", int $pad_type = STR_PAD_RIGHT)

      echo str_pad($i, 2, '0', STR_PAD_LEFT);

      if ($i <= 99) {
        echo ",";
      }
      if (($i + 1) % 20 == 0) {
        echo "<br>";
      }
    };

        echo'============================================================</br>';
      for ($i = 1; $i <= 6; $i++) {
        echo '<tr>';
        for ($j = 1; $j <= 6; $j++) {
          echo " <td>$i * $j =" . $i * $j . '<td>';
        };
        echo '</tr>';
      };

      -->

  </body>

  </html>