<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\StringToNumberService;

class StringToNumberServiceTest extends TestCase
{
    /**
     * Тестирование конвертации обычной строки в число.
     */
    public function test_convert_string_to_number()
    {
        $service = new StringToNumberService();

        $result1 = $service->convert('test123hello');
        $result2 = $service->convert('test123hello');

        $this->assertEquals($result1, $result2);
        $this->assertIsInt($result1);
    }

    /**
     * Тестирование конвертации пустой строки.
     */
    public function test_convert_empty_string()
    {
        $service = new StringToNumberService();

        $result = $service->convert('');

        $this->assertIsInt($result);
    }

    /**
     * Тестирование конвертации строки с пробелами.
     */
    public function test_convert_string_with_spaces()
    {
        $service = new StringToNumberService();

        $result = $service->convert('   ');

        $this->assertIsInt($result);
    }

    /**
     * Тестирование конвертации строки с символами.
     */
    public function test_convert_string_with_special_characters()
    {
        $service = new StringToNumberService();

        $result = $service->convert('!@#$%^&*()_+');

        $this->assertIsInt($result);
    }

    /**
     * Тестирование конвертации длинной строки.
     */
    public function test_convert_long_string()
    {
        $service = new StringToNumberService();

        $result = $service->convert(str_repeat('a', 32));

        $this->assertIsInt($result);
    }

    /**
     * Тестирование конвертации строки с различными символами.
     */
    public function test_convert_string_with_various_characters()
    {
        $service = new StringToNumberService();

        $result = $service->convert('test123!@#');

        $this->assertIsInt($result);
    }

    /**
     * Тестирование на устойчивость к переполнению.
     */
    public function test_convert_string_with_overflow_potential()
    {
        $service = new StringToNumberService();

        $result = $service->convert(str_repeat('z', 32));

        $this->assertIsInt($result);
    }
}
