<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Truncater;

class TruncaterTest extends TestCase
{
    private $fullName = 'Тюрин Максим Сергеевич';
    public function testTruncateEmptyString()
    {
        $truncater = new Truncater();
        $result = $truncater->truncate('');
        $this->assertEquals('', $result);
    }

    public function testTruncateWithDefaultConfiguration()
    {
        $truncater = new Truncater();

        $result = $truncater->truncate($this->fullName);
        $this->assertEquals('Тюрин Максим Сергеевич', $result);
    }

    public function testTruncateWithCustomLengthAndDefaultSeparator()
    {
        $truncater = new Truncater();

        $result = $truncater->truncate($this->fullName, ['length' => 10]);
        $this->assertEquals('Тюрин Макс...', $result);

        $result = $truncater->truncate($this->fullName, ['length' => 50]);
        $this->assertEquals('Тюрин Максим Сергеевич', $result);
    }

    public function testTruncateWithNegativeLength()
    {
        $truncater = new Truncater();
        $result = $truncater->truncate($this->fullName, ['length' => -10]);
        $this->assertEquals('', $result);
    }

    public function testTruncateWithCustomSeparatorAndCustomLength()
    {
        $truncater = new Truncater();
        $result = $truncater->truncate($this->fullName, ['length' => 10, 'separator' => '*']);
        $this->assertEquals('Тюрин Макс*', $result);
    }

    public function testTruncateWithCustomSeparatorAndDefaultLength()
    {
        $truncater = new Truncater();
        $result = $truncater->truncate($this->fullName, ['separator' => '*']);
        $this->assertEquals('Тюрин Максим Сергеевич', $result);
    }

    public function testTruncateConstructor()
    {
        $truncater = new Truncater(['length' => 10, 'separator' => '...!']);

        $result = $truncater->truncate($this->fullName);
        $this->assertEquals('Тюрин Макс...!', $result);
    }
}
