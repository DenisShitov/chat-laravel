<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::retrieved(function (Message $message) {
            $unread_and_receiver = is_null($message->read_at) && auth()->id() === $message->receiver_id;
            if($unread_and_receiver) $message->update(['read_at' => Carbon::now()]);
        });
    }
    protected $fillable = ['user_id', 'receiver_id', 'text', 'read_at'];
    protected $appends = ['isOwn'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getIsOwnAttribute(): bool
    {
        return $this->user_id === auth()->id();
    }

    public function scopeRelated(Builder $query): void
    {
        $id = auth()->id();
        $query->where('user_id', $id)->orWhere('receiver_id', $id);
    }

    public function scopeUnread(Builder $query): void
    {
        $query->whereNull('read_at');
    }
}
