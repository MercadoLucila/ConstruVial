<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Maintenance extends Model
{
    Use HasFactory;

    protected $fillable = [
        'name',
        'kms_needed',
    ];

    public function service(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}
