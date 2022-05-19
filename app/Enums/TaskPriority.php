<?php

namespace App\Enums;

enum TaskPriority: string
{
    case LOWEST = 'lowest';
    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';
    case HIGHEST = 'highest';
}
