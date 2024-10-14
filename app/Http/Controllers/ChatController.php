<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenAIService;
class ChatController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function ask(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
        ]);

        // Depuración: Verificar si la clave de API está siendo cargada
        //dd(env('OPENAI_API_KEY'));

        // Obtenemos la respuesta del servicio OpenAI
        $response = $this->openAIService->askQuestion($request->question);

        // Redirigimos a la misma vista con la respuesta
        return redirect()->back()->with('response', $response);
    }
}
