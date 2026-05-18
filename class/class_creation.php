<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Class</title>
</head>

<body>

    <?php

    class Car
    {
        public $color;
        public $name;
        public $quality;
        public $model;
        public $speed;
        public $guarantee;

        public function start()
        {
            echo "The car is starting <br>";
        }

        public function move()
        {
            echo "The car is moving <br>";
        }
    }

    $car = new Car();
    $car->color = "Red";
    $car->model = "Toyota";

    $car->start();

    echo "{$car->color}<br>";
    echo $car->model . "<br>";

    echo "<hr>";

    $limuzin = new Car();
    $limuzin->color = "White";
    $limuzin->model = "Limuzin";

    $limuzin->start();

    echo $limuzin->color . "<br>";
    echo $limuzin->model . "<br>";

    ?>

</body>

</html>