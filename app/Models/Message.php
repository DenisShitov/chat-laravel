<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'receiver_id', 'text'];
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
        return $this->user_id === auth()->user()->id;
    }

    public function scopeRelated(Builder $query): void
    {
        $id = auth()->user()->id;
        $query->where('user_id', $id)->orWhere('receiver_id', $id);
    }
}
