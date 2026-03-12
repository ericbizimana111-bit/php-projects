<!DOCTYPE html>
<html>
<head>
    <title>Multiplication Table</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            border: 2px solid black; 
        }
    </style>
</head>
<body>

<table>
<?php
for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= 10; $j++) {
        echo "<td>" . ($i * $j) . "</td>";
    } 
    echo "</tr>";
}
?>
</table>

</body>
</html>
