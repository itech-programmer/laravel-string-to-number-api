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
        return abs(crc32($string));
    }
}
