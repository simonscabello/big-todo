<?php

namespace App\Enums;

enum TaskType: string
{
    case FEATURE = 'feature';
    case BUGFIX  = 'bugfix';
    case HOTFIX  = 'hotfix';
    case CHORE   = 'chore';
}
