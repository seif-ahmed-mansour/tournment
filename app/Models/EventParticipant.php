<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventParticipant extends Model
{
    use HasFactory;
    protected $fillable = ["user_id", "score", "event_id"];
    public function event():BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
