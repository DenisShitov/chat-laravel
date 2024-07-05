<?php

namespace App\Http\Controllers;

use App\Events\MessageSended;
use App\Http\Requests\CreateMessageRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SendMessage extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateMessageRequest $request, User $user)
    {
        $message = Message::create([
            ...$request->validated(),
            'user_id' => auth()->user()->id,
            'receiver_id' => $user->id]);
        MessageSended::dispatch($message);
        Inertia::share('messages', Message::related()->latest()->get());
    }
}
