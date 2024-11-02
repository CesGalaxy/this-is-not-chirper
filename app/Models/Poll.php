<?php

namespace App\Models;

use Auth;
use Exception;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'options',
    ];

    public function chirp(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Chirp::class);
    }

    public function votes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PollVote::class);
    }
}
