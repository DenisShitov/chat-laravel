<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GetUserMessages extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user)
    {
        $relatedUserIds = [auth()->id(), $user->id];

        $messages = Message::query()->whereIn('user_id', $relatedUserIds)->whereIn('receiver_id', $relatedUserIds);

        $unreadMessages = $messages->clone()->whereNull('read_at')->get();

//        foreach ($unreadMessages as $unreadMessage) {
//            $unreadMessage->update([
//                'read_at' => Carbon::now(),
//            ]);
//        }

        return Inertia::render('Messenger', [
            'messages' => fn () => $messages->get(),
            'receiver' => $user,
            'contacts' => fn () => User::whereNot('id', auth()->id())->withCount(['unreadMessages'])->get(),
        ]);
    }
}
