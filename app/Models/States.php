<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class States extends Model
{
    protected $table = 'states';

    protected $fillable = [
        'name',
        'abbr',
    ];

    public function cities(): HasMany
    {
        return $this->hasMany(Cities::class);
    }
}
