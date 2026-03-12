<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    class Car
    {
        public $color;
        public $model;
        public $name;
        public $quality;
        public $speed;
        public $guarantee;
        public function start()
        {
            echo "The car is starting '<br>'";
        }
        public function move()
        {
            echo "The car is moving '<br>'";
        }
    }


    $car = new Car();
    $car->color = "Red";
    $car->model = "Toyota";
    $car->start();
    echo "$car->color '<br>'";
    echo "$car->model '<br>'";


    $limuzin = new Car();
    $limuzin->color = "white";
    $limuzin->model = "limuzin";
    $limuzin->start();



    ?>

</body>

</html>