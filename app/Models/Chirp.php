<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Chirp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Chirp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Chirp query()
 * @mixin Eloquent
 * @mixin IdeHelperChirp
 */
class Chirp extends Model
{
    //
    protected $fillable = [
        'message',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
