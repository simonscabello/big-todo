<?php

namespace App\Enums;

enum TaskType: string
{
    case Feature = 'feature';
    case Bugfix  = 'bugfix';
    case Hotfix  = 'hotfix';
    case Chore   = 'chore';
}
