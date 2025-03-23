<?php

namespace App;

class Truncater
{
    private static $defaultOptions = [
        'length' => 50,
        'separator' => '...'
    ];

    public function __construct(array $options = [])
    {
        self::$defaultOptions = array_merge(self::$defaultOptions, $options);
    }

    public function truncate(string $text, array $options = []): string
    {
        $options = array_merge(self::$defaultOptions, $options);

        if ($options['length'] <= 0) {
            return '';
        }
        if (strlen($text) <= $options['length']) {
            return $text;
        }

        return mb_substr($text, 0, $options['length']) . $options['separator'];
    }
}
