<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChatGPTService;
use Illuminate\Support\Facades\Log;

class IAController extends Controller
{
    protected $chatGPTService;

    public function __construct(ChatGPTService $chatGPTService)
    {
        $this->chatGPTService = $chatGPTService;
    }

    public function sendMessage(Request $request)
    {
        // Validar a entrada
        $request->validate([
            'message' => 'required|string',
        ]);

        try {
            // Enviar a mensagem para o ChatGPT e obter a resposta
            $response = $this->chatGPTService->sendMessage($request->message);

            // Retornar a resposta do ChatGPT
            return response()->json([
                'success' => true,
                'response' => $response,
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to communicate with ChatGPT: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Houve um erro na comunicação com o chat GPT.',
            ], 500);
        }
    }
}