<?php

declare(strict_types=1);

namespace App\Enums;

enum TimeEnum: string
{
    case MORNING = 'Morning';
    case AFTERNOON = 'Afternoon';
    case EVENING = 'Evening';

    public static function getTranslatedValues(): array
    {
        return [
            self::MORNING->value => 'Manhã',
            self::AFTERNOON->value => 'Tarde',
            self::EVENING->value => 'Noite',
        ];
    }
}
