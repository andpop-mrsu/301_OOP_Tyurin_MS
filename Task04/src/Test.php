<?php

namespace App;

function runTest()
{
    echo "=== Тесты для Stack ===" . PHP_EOL;

    $stack = new Stack(1, 2, 3);
    echo "Ожидается: [3->2->1]" . PHP_EOL;
    echo "Получено: " . $stack . PHP_EOL . PHP_EOL;

    $stack->push(4, 5);
    echo "Ожидается: [5->4->3->2->1]" . PHP_EOL;
    echo "Получено: " . $stack . PHP_EOL . PHP_EOL;

    $popped = $stack->pop();
    echo "Ожидается: 5" . PHP_EOL;
    echo "Получено: " . $popped . PHP_EOL . PHP_EOL;

    echo "Ожидается: [4->3->2->1]" . PHP_EOL;
    echo "Получено: " . $stack . PHP_EOL . PHP_EOL;

    $isEmpty = $stack->isEmpty() ? 'true' : 'false';
    echo "Ожидается: false" . PHP_EOL;
    echo "Получено: " . $isEmpty . PHP_EOL . PHP_EOL;

    $copy = $stack->copy();
    echo "Ожидается: [4->3->2->1]" . PHP_EOL;
    echo "Получено: " . $copy . PHP_EOL . PHP_EOL;

    echo "=== Тесты для compareStrings ===" . PHP_EOL;

    $s1 = "ab#c";
    $s2 = "ade##c";
    echo "Сравнение \"$s1\" и \"$s2\"" . PHP_EOL;
    echo "Ожидается: true" . PHP_EOL;
    echo "Получено: " . (compareStrings($s1, $s2) ? 'true' : 'false') . PHP_EOL . PHP_EOL;

    $s1 = "a#c";
    $s2 = "c#";
    echo "Сравнение \"$s1\" и \"$s2\"" . PHP_EOL;
    echo "Ожидается: false" . PHP_EOL;
    echo "Получено: " . (compareStrings($s1, $s2) ? 'true' : 'false') . PHP_EOL . PHP_EOL;

    $s1 = "abc###";
    $s2 = "a#b#";
    echo "Сравнение \"$s1\" и \"$s2\"" . PHP_EOL;
    echo "Ожидается: true" . PHP_EOL;
    echo "Получено: " . (compareStrings($s1, $s2) ? 'true' : 'false') . PHP_EOL . PHP_EOL;

    echo "=== Тесты для checkIfBalanced ===" . PHP_EOL;

    $input = "()";
    echo "Проверка \"$input\"" . PHP_EOL;
    echo "Ожидается: true" . PHP_EOL;
    echo "Получено: " . (checkIfBalanced($input) ? 'true' : 'false') . PHP_EOL . PHP_EOL;

    $input = "({[]})";
    echo "Проверка \"$input\"" . PHP_EOL;
    echo "Ожидается: true" . PHP_EOL;
    echo "Получено: " . (checkIfBalanced($input) ? 'true' : 'false') . PHP_EOL . PHP_EOL;

    $input = "({[})";
    echo "Проверка \"$input\"" . PHP_EOL;
    echo "Ожидается: false" . PHP_EOL;
    echo "Получено: " . (checkIfBalanced($input) ? 'true' : 'false') . PHP_EOL . PHP_EOL;

    $input = "(";
    echo "Проверка \"$input\"" . PHP_EOL;
    echo "Ожидается: false" . PHP_EOL;
    echo "Получено: " . (checkIfBalanced($input) ? 'true' : 'false') . PHP_EOL . PHP_EOL;

    $input = "{[()]}";
    echo "Проверка \"$input\"" . PHP_EOL;
    echo "Ожидается: true" . PHP_EOL;
    echo "Получено: " . (checkIfBalanced($input) ? 'true' : 'false') . PHP_EOL . PHP_EOL;

    $input = "{[(])}";
    echo "Проверка \"$input\"" . PHP_EOL;
    echo "Ожидается: false" . PHP_EOL;
    echo "Получено: " . (checkIfBalanced($input) ? 'true' : 'false') . PHP_EOL . PHP_EOL;
}
