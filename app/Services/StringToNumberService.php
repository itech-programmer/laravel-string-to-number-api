<?php

namespace App\Services;

class StringToNumberService
{
    /**
     * Преобразует строку в число.
     *
     * @param string $string
     * @return int
     */
    public function convert(string $string): int
    {
        $hash = crc32($string);
        return abs($hash);
    }
}
