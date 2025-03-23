<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Book;
use App\BooksList;

class BookTest extends TestCase
{
    public function testConstructorAndToString()
    {
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

        $this->assertEquals($expected, (string) $book1);
    }

    public function testSettersAndGetters()
    {
        $book1 = new Book(
            "Теория вероятностей и случайные процессы",
            ["Н. М. Куляшова"],
            "Кафедра прикладной математики",
            2020
        );

        $book1->setTitle("Новая теория вероятностей")
            ->setAuthors(["Иванов И.И.", "Петров П.П."])
            ->setPublisher("Издательство МГУ")
            ->setYear(2022);

        $expected =
            "Id: 2\n" .
            "Название: Новая теория вероятностей\n" .
            "Автор1: Иванов И.И.\n" .
            "Автор2: Петров П.П.\n" .
            "Издательство: Издательство МГУ\n" .
            "Год: 2022\n";

        $this->assertEquals($expected, (string) $book1);
    }

    public function testBooksList()
    {
        $book1 = new Book(
            "Теория вероятностей и случайные процессы",
            ["Н. М. Куляшова"],
            "Кафедра прикладной математики",
            2020
        );

        $book2 = new Book(
            "Практикум по теории конечных автоматов и формальных языков",
            ["М. В. Мещеряков", "Л. А. Сухарев"],
            "Изд-во Мордовского ун-та",
            2018
        );

        $booksList = new BooksList();
        $booksList->add($book1);
        $booksList->add($book2);

        $this->assertEquals(2, $booksList->count());

        $this->assertEquals($book1, $booksList->get(0));
        $this->assertEquals($book2, $booksList->get(1));
    }

    public function testStoreAndLoad()
    {
        $book1 = new Book(
            "Теория вероятностей и случайные процессы",
            ["Н. М. Куляшова"],
            "Кафедра прикладной математики",
            2020
        );

        $book2 = new Book(
            "Практикум по теории конечных автоматов и формальных языков",
            ["М. В. Мещеряков", "Л. А. Сухарев"],
            "Изд-во Мордовского ун-та",
            2018
        );

        $booksList = new BooksList();
        $booksList->add($book1);
        $booksList->add($book2);

        $booksList->store(__DIR__ . '/books.dat');

        $loadedList = new BooksList();
        $loadedList->load(__DIR__ . '/books.dat');

        $this->assertEquals(2, $loadedList->count());

        $this->assertEquals($book1, $loadedList->get(0));

        unlink(__DIR__ . '/books.dat');
    }
    public function testBooksListIterationWithIds()
    {
        $book1 = new Book(
            "Теория вероятностей",
            ["Н. М. Куляшова"],
            "Издательство МГУ",
            2020
        );

        $book2 = new Book(
            "Алгоритмы и структуры данных",
            ["Дональд Кнут"],
            "Издательство программирования",
            2019
        );

        $booksList = new BooksList();
        $booksList->add($book1);
        $booksList->add($book2);

        $expected = [
            $book1->getId() => $book1,
            $book2->getId() => $book2
        ];

        foreach ($booksList as $key => $book) {
            $this->assertEquals($book->getId(), $key);
            $this->assertEquals($expected[$key], $book);
        }
    }
}
