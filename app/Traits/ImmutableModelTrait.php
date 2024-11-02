<?php

namespace App\Traits;

use RuntimeException;

/**
 * @method static updating(\Closure $param)
 * @method static deleting(\Closure $param)
 */
trait ImmutableModelTrait
{
    public static function bootImmutableModelTrait(): void
    {
        static::updating(function (): never {
            throw new RuntimeException('This model is immutable and cannot be updated.');
        });

        static::deleting(function (): never {
            throw new RuntimeException('This model is immutable and cannot be deleted.');
        });
    }
}
