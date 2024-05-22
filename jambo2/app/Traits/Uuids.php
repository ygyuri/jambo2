<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Uuids
{
    /**
     * Boot function from Laravel.
     */
    protected static function bootUuids()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the data type of the primary key.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}