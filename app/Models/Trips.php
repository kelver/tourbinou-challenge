<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trips extends Model
{
    use HasFactory;

    protected $table = 'trips';

    protected $fillable = [
        'name',
        'description',
        'time',
        'destination_id',
    ];

    const MORNING = 'Morning';
    const AFTERNOON = 'Afternoon';
    const EVENING = 'Evening';

    protected static $translations = [
        self::MORNING => 'Manhã',
        self::AFTERNOON => 'Tarde',
        self::EVENING => 'Noite',
    ];

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destinations::class);
    }

    public function getTranslatedTimeAttribute()
    {
        return self::$translations[$this->time] ?? $this->time;
    }
}
