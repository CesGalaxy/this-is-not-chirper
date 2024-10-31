<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Chirp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Chirp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Chirp query()
 *
 * @mixin Eloquent
 * @mixin IdeHelperChirp
 */
class Chirp extends Model
{
    //
    protected $fillable = [
        'parent_id',
        'message',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function replies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Chirp::class, 'parent_id');
    }

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Chirp::class, 'parent_id');
    }
}
