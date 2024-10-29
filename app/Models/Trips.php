<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
