<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GetUserMessages extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user)
    {
        $relatedUserIds = [auth()->user()->id, $user->id];
        return Inertia::render('Messenger', [
            'messages' => fn () => Message::whereIn('user_id', $relatedUserIds)->whereIn('receiver_id', $relatedUserIds)->get(),
            'receiver' => $user
        ]);
    }
}
