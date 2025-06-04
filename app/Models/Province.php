<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends Model
{
    Use HasFactory;
    
    protected $fillable = [
        'name',
    ];

    public function work_sites(): HasMany
    {
        return $this->hasMany(Work_site::class);
    }
}
