<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StringToNumberRequest;
use App\Services\StringToNumberService;
use Illuminate\Http\JsonResponse;

class StringToNumberController extends Controller
{
    private StringToNumberService $stringToNumberService;

    /**
     * Инъекция зависимостей через конструктор.
     *
     * @param StringToNumberService $stringToNumberService
     */
    public function __construct(StringToNumberService $stringToNumberService)
    {
        $this->stringToNumberService = $stringToNumberService;
    }

    /**
     * Обрабатывает запрос на преобразование строки в число.
     *
     * @param StringToNumberRequest $request
     * @return JsonResponse
     */
    public function convert(StringToNumberRequest $request): JsonResponse
    {
        $result = $this->stringToNumberService->convert($request->input('string'));

        return response()->json(['result' => $result], 200);
    }
}
