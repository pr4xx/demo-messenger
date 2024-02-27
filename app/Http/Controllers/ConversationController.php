<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConversationResource;
use App\Models\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index()
    {
        sleep(1);

        $conversations = Conversation::query()->latest()->get();

        return ConversationResource::collection($conversations);
    }

    public function destroy(Conversation $conversation)
    {
        $conversation->delete();

        return 'ok';
    }
}
