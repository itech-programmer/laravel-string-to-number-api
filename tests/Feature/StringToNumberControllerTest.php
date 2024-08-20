<?php

namespace Tests\Feature;

use Tests\TestCase;

class StringToNumberControllerTest extends TestCase
{
    /**
     * Тестирование успешного преобразования строки в число.
     *
     * Проверяет, что API возвращает ожидаемое число для заданной строки.
     *
     * @return void
     */
    public function test_string_to_number_api_success()
    {
        $response = $this->postJson('/api/string/to/number', ['string' => 'test123hello']);
        $response->assertStatus(200)
            ->assertJson([
                'result' => 3379309020
            ]);
    }

    /**
     * Тестирование API при отсутствии строки в запросе.
     *
     * Проверяет, что API возвращает ошибку валидации, если строка отсутствует.
     *
     * @return void
     */
    public function test_string_to_number_api_missing_string()
    {
        $response = $this->postJson('/api/string/to/number', []);
        $response->assertStatus(422)
        ->assertJsonValidationErrors(['string']);
    }

    /**
     * Тестирование API при строке длиной больше 32 символов.
     *
     * Проверяет, что API возвращает ошибку валидации, если строка слишком длинная.
     *
     * @return void
     */
    public function test_string_to_number_api_string_too_long()
    {
        $response = $this->postJson('/api/string/to/number', ['string' => str_repeat('a', 33)]);
        $response->assertStatus(422)
        ->assertJsonValidationErrors(['string']);
    }

    /**
     * Тестирование API при неверном типе данных для строки.
     *
     * Проверяет, что API возвращает ошибку валидации, если тип данных не строка.
     *
     * @return void
     */
    public function test_string_to_number_api_invalid_data_type()
    {
        $response = $this->postJson('/api/string/to/number', ['string' => 12345]);
        $response->assertStatus(422)
        ->assertJsonValidationErrors(['string']);
    }
}
