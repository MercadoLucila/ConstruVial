<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignment extends Model
{
    Use HasFactory;

     protected $fillable = [
        'start_date',
        'end_date',
        'end_motive',
        'kms',
        'arrive_time',
        'worksite_id',
        'machine_id'
    ];

    public function worksite(): BelongsTo
    {
        return $this->belongsTo(WorkSite::class);
    }

    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }
}
