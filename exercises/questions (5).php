<?php
$result = "";
$num1 = "";
$num2 = "";

if (isset($_POST['operator'])) {
    $num1 = (float)$_POST['num1'];
    $num2 = (float)$_POST['num2'];
    $operator = $_POST['operator'];

    switch ($operator) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
        case '/':
            $result = ($num2 != 0) ? $num1 / $num2 : "Division by zero!";
            break;
        default:
            $result = "Invalid operator";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Simple Calculator</title>
</head>

<body>

    <h2>Simple Calculator Operations</h2>

    <form method="post">
        First Number:
        <input type="number" name="num1" step="any" value="<?php echo $num1; ?>" required><br><br>

        Second Number:
        <input type="number" name="num2" step="any" value="<?php echo $num2; ?>" required><br><br>

        Result:
        <input type="text" step="any" value="<?php echo $result; ?>" readonly><br><br>

        <input type="submit" name="operator" value="+">
        <input type="submit" name="operator" value="-">
        <input type="submit" name="operator" value="*">
        <input type="submit" name="operator" value="/">
    </form>

</body>

</html>