<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Patient extends Model
{
    use SoftDeletes;

    /**
     * @return HasMany
     */
    public function addresses()
    {
        return $this->hasMany(PatientAddress::class);
    }

    /**
     * @return HasMany
     */
    public function contacts()
    {
        return $this->hasMany(PatientContact::class);
    }

    /**
     * @param $value
     */
    public function setBirthAttribute($value)
    {
        $this->attributes['birth'] = \Carbon\Carbon::createFromFormat('d/m/Y', $value)
            ->toDateString();
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->last_name}";
    }
}
