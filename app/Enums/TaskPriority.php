<?php

namespace App\Enums;

enum TaskPriority: string
{
    case Lowest  = 'lowest';
    case Low     = 'low';
    case Medium  = 'medium';
    case High    = 'high';
    case Highest = 'highest';

    public function color(): string
    {
        return match($this)
        {
            TaskPriority::Lowest  => '#0D79AC',
            TaskPriority::Low     => '#0DAC10',
            TaskPriority::Medium  => '#FFB900',
            TaskPriority::High    => '#FF7800',
            TaskPriority::Highest => '#FF0000',
        };
    }
}
