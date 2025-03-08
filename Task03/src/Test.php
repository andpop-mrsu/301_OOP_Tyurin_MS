<?php

namespace App;

class Test
{
    public static function runTest()
    {
        echo "TEST1 (тест конструктора и __toString)" . PHP_EOL;
        $book1 = new Book(
            "Теория вероятностей и случайные процессы",
            ["Н. М. Куляшова"],
            "Кафедра прикладной математики, дифференциальных уравнений и теоретической механики" .
            " ФГБОУ ВО «МГУ им. Н. П. Огарёва»",
            2020
        );

        $expected =
        "Id: 1\n" .
        "Название: Теория вероятностей и случайные процессы\n" .
        "Автор1: Н. М. Куляшова\n" .
        "Издательство: Кафедра прикладной математики, дифференциальных уравнений и теоретической механики " .
        "ФГБОУ ВО «МГУ им. Н. П. Огарёва»\n" .
        "Год: 2020\n";

        echo 'Ожидается: ' . PHP_EOL . $expected . PHP_EOL;
        echo 'Получено: ' . PHP_EOL . $book1 . PHP_EOL;


        echo PHP_EOL . "TEST2 (тест геттеров и сеттеров)" . PHP_EOL . PHP_EOL;
        $book1->setTitle("Новая теория вероятностей")
          ->setAuthors(["Иванов И.И.", "Петров П.П."])
          ->setPublisher("Издательство МГУ")
          ->setYear(2022);

        $expected =
        "Id: 1\n" .
        "Название: Новая теория вероятностей\n" .
        "Автор1: Иванов И.И.\n" .
        "Автор2: Петров П.П.\n" .
        "Издательство: Издательство МГУ\n" .
        "Год: 2022\n";

        echo 'Ожидается: ' . PHP_EOL . $expected . PHP_EOL;
        echo 'Получено: ' . PHP_EOL . $book1 . PHP_EOL;


        echo PHP_EOL . "TEST3 (тест списка книг)" . PHP_EOL;
        $book2 = new Book(
            "Практикум по теории конечных автоматов и формальных языков",
            ["М. В. Мещеряков", "Л. А. Сухарев"],
            "Изд-во Мордовского ун-та",
            2018
        );

        $booksList = new BooksList();
        $booksList->add($book1);
        $booksList->add($book2);

        $expectedCount = 2;
        $actualCount = $booksList->count();
        echo "Ожидается количество книг: $expectedCount" . PHP_EOL;
        echo "Получено количество книг: $actualCount" . PHP_EOL;


        echo PHP_EOL . "TEST4 (тест сохранения и загрузки списка книг)" . PHP_EOL . PHP_EOL;
        $booksList->store("books.dat");

        $loadedList = new BooksList();
        $loadedList->load("books.dat");

        $expectedLoadedCount = 2;
        $actualLoadedCount = $loadedList->count();
        echo "Ожидается количество книг после загрузки: $expectedLoadedCount" . PHP_EOL;
        echo "Получено количество книг после загрузки: $actualLoadedCount" . PHP_EOL;


        echo PHP_EOL . "Ожидается первая книга после загрузки: " . PHP_EOL;
        echo $expected . PHP_EOL;
        echo "Получено первая книга после загрузки: " . PHP_EOL;
        echo $loadedList->get(0) . PHP_EOL;
    }
}
