<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkSite extends Model
{
    Use HasFactory;
    
    protected $table = 'worksites';

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'province_id',
    ];

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function assignment(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }

}