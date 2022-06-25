<?php

namespace App\Enums;

enum TaskPriority: string
{
    case LOWEST = 'lowest';
    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';
    case HIGHEST = 'highest';

    public function color(): string
    {
        return match($this)
        {
            TaskPriority::LOWEST => '#0D79AC',
            TaskPriority::LOW => '#0DAC10',
            TaskPriority::MEDIUM => '#FFB900',
            TaskPriority::HIGH => '#FF7800',
            TaskPriority::HIGHEST => '#FF0000',
        };
    }
}
