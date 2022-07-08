<?php

namespace App\Enums;

enum TaskState: string
{
    case OnHold               = 'on_hold';
    case ReadyForDevelopment  = 'ready_for_development';
    case InDevelopment        = 'in_development';
    case Done                 = 'done';
    case InHomologation       = 'in_homologation';
    case InTest               = 'in_test';
    case ReadyForProduction   = 'ready_for_production';
    case InProduction         = 'in_production';
}
