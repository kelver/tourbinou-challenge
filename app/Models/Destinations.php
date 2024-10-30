<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destinations extends Model
{
    use HasFactory;

    protected $table = 'destinations';

    protected $fillable = [
        'city_id',
        'state_id',
    ];

    public function trips(): HasMany
    {
        return $this->hasMany(Trips::class, 'destination_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(Cities::class, 'city_id');
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(States::class, 'state_id');
    }
}
