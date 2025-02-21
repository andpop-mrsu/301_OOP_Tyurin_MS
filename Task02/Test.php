<?php

require_once 'Vector.php';

use Task02\Vector;

function runTest()
{
    // String representation test
    $v1 = new Vector(1, 2, 3);
    echo "Ожидается: (1; 2; 3)" . PHP_EOL;
    echo "Получено: " . $v1 . PHP_EOL . PHP_EOL;

    // Adding test
    $v2 = new Vector(1, 4, -2);
    $v3 = $v1->add($v2);
    echo "Ожидается: (2; 6; 1)" . PHP_EOL;
    echo "Получено: " . $v3 . PHP_EOL . PHP_EOL;

    // Subtracting test
    $v4 = $v1->sub($v2);
    echo "Ожидается: (0; -2; 5)" . PHP_EOL;
    echo "Получено: " . $v4 . PHP_EOL . PHP_EOL;

    // Scalar multiplication test
    $v5 = $v1->product(2);
    echo "Ожидается: (2; 4; 6)" . PHP_EOL;
    echo "Получено: " . $v5 . PHP_EOL . PHP_EOL;

    // Scalar product test
    $scalar = $v1->scalarProduct($v2);
    echo "Ожидается: 1*1 + 2*4 + 3*(-2) = 3" . PHP_EOL;
    echo "Получено: " . $scalar . PHP_EOL . PHP_EOL;

    // Vector product test
    $v6 = $v1->vectorProduct($v2);
    echo "Ожидается: (-14; 5; 2)" . PHP_EOL;
    echo "Получено: " . $v6 . PHP_EOL . PHP_EOL;
}
