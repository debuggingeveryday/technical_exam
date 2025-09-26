<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Inertia\Inertia;
use MoeMizrak\LaravelOpenrouter\DTO\MessageData;
use MoeMizrak\LaravelOpenrouter\DTO\ChatData;
use MoeMizrak\LaravelOpenrouter\Facades\LaravelOpenRouter;

class ChatAIController extends Controller
{
    public function index() {
        return Inertia::render('ChatPageAI');
    }

    public function ask_question(Request $request) {

        $content = $request->prompt;

        $model = 'openai/gpt-3.5-turbo';

        $messageData = new MessageData([
            'content' => $content,
            'role'    => 'user',
        ]);

        $chatData = new ChatData([
            'messages'   => [
                $messageData,
            ],
            'model'      => $model,
            'max_tokens' => 100,
        ]);

        $response = LaravelOpenRouter::chatRequest($chatData);
        $content = Arr::get($response->choices[0], 'message.content');

        return to_route('index')->with([
            'response' => $content
        ]);
    }
}
