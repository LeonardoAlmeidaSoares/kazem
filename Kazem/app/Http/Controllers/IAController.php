<?php

namespace App\Http\Controllers;

use App\Models\PersonagemModel;
use Illuminate\Http\Request;
use App\Services\ChatGPTService;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class IAController extends Controller
{
    protected $chatGPTService;
    private $thread_id = "";
    private $assistant_id = "asst_ebRWgAvEWHJTd8i5bG9adbwQ";

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

    public function continueConversation(Request $request)
    {
        try {
            $msg = "Qual é o nome do meu cenário?";
            // Thread ID específico da conversa
            $threadId = 'thread_VLDTEhA7oxqrae2dfspo4DOR';

            // Crie uma instância do cliente HTTP
            $client = new Client();
            /*
            // Envie a solicitação para a API do OpenAI
            $response = $client->post("https://api.openai.com/v1/threads/$threadId/messages", [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                    'Content-Type' => 'application/json',
                    'OpenAI-Beta' => 'assistants=v2', // Cabeçalho necessário para acessar a API de Assistants
                ],
                'json' => [
                    // Especifica o assistente'=> ''. env(''),
                    'role' => 'user',
                    'content' => $msg,
                ]
            ]);
            */
            $response = $client->post("https://api.openai.com/v1/threads/$threadId/runs", [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                    'Content-Type' => 'application/json',
                    'OpenAI-Beta' => 'assistants=v2', // Cabeçalho necessário para acessar a API de Assistants
                ],
                
                'json' => [
                    'assistant_id' => $this->assistant_id,
                    //'role' => 'user',
                    //'content' => $msg,
                ]
            ]);

            // Obtenha a resposta e verifique o status
            $responseBody = json_decode($response->getBody(), true);

            dd($responseBody);
            // Verifique se a resposta da API é válida e contém a mensagem de resposta
            if (isset($responseBody['messages']) && count($responseBody['messages']) > 0) {
                $reply = $responseBody['messages'][0]['content']; // A mensagem da assistente estará aqui
                return response()->json(['response' => $reply]);
            } else {
                // Resposta inesperada ou vazia
                return response()->json([
                    'error' => true,
                    'message' => 'Não foi possível obter uma resposta da assistente.'
                ], 500);
            }

        } catch (\Exception $e) {
            // Tratamento de erro para exibir mensagem adequada
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function generateImage(Request $request)
    {
        // Cria uma instância do cliente Guzzle
        $client = new Client();

        // Define a URL da API e a chave de autenticação
        $url = 'https://api.openai.com/v1/images/generations';
        $apiKey = env('OPENAI_API_KEY');

        // Monta o payload da requisição
        $payload = [
            'model' => 'dall-e-3',
            'prompt' => $request->prompt,
            //'prompt' => "Um gato siames",
            'n' => 1,
            'size' => '1024x1024',
        ];

        try {
            // Faz a requisição à API
            $response = $client->post($url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $apiKey,
                ],
                'json' => $payload,
            ]);

            // Decodifica a resposta
            $data = json_decode($response->getBody(), true);

            // Verifica se há imagens na resposta
            if (isset($data['data'][0]['url'])) {
                $imageUrl = $data['data'][0]['url'];

                // Faz o download da imagem
                $imageContent = file_get_contents($imageUrl);

                // Gera um nome único para a imagem
                $imageName = uniqid() . '.png';

                // Salva a imagem no sistema de arquivos (pasta "public/images")
                Storage::disk('public')->put('images/' . $imageName, $imageContent);

                // Retorna o caminho público da imagem
                $imagePath = Storage::url("images/" . $imageName);

                return response()->json([
                    'message' => 'Image generated and saved successfully!',
                    'image_url' => $imagePath
                ]);
            } else {
                return response()->json([
                    'error' => 'No image generated.'
                ], 500);
            }

        } catch (\Exception $e) {
            // Em caso de erro, retorna a mensagem de erro
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}