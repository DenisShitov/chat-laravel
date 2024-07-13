<?php

namespace App\Http\Controllers;

use App\Events\MessageSended;
use App\Http\Requests\CreateMessageRequest;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
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
            'user_id' => auth()->id(),
            'receiver_id' => $user->id]);

        $relatedUserIds = [auth()->id(), $user->id];
        $messages = Message::query()->whereIn('user_id', $relatedUserIds)->whereIn('receiver_id', $relatedUserIds);

        MessageSended::dispatch($message);
        Inertia::share('messages', $messages->get());
        Inertia::share('contacts', User::whereNot('id', auth()->id())->withCount(['unreadMessages'])->get());
    }
}
