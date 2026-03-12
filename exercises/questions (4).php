<!DOCTYPE html>
<html>

<head>
    <title>Student Grade Program</title>
    <style>
        h3 {
            text-align: center;
        }

        input[type="number"] {
            margin-top: 5px;
        }

        input[type="submit"] {
            margin-top: 10px;
        }

        .result {
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="box">
        <h3>Enter Student Marks</h3>

        <form method="post">
            Percentage:
            <input
                type="number"
                name="percentage"
                min="0"
                max="100"
                step="any"
                required>
            </br>
            <input type="submit" name="submit" value="Display Grade">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            // Receive decimal marks
            $percentage = (float) $_POST['percentage'];
            $grade = "";

            if ($percentage >= 90 && $percentage <= 100) {
                $grade = "A";
            } elseif ($percentage >= 80) {
                $grade = "B";
            } elseif ($percentage >= 70) {
                $grade = "C";
            } elseif ($percentage >= 60) {
                $grade = "D";
            } elseif ($percentage >= 50) {
                $grade = "E";
            } elseif ($percentage >= 40) {
                $grade = "F";
            } else {
                $grade = "U";
            }

            echo "<div class='result'>
                Percentage: " . number_format($percentage, 2) . "% <br>
                Grade: $grade
              </div>";
        }
        ?>
    </div>

</body>

</html>