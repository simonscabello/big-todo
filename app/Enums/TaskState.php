<?php

namespace App\Enums;

enum TaskState: string
{
    case ON_HOLD              = 'on_hold';
    case READY                = 'ready';
    case IN_DEVELOPMENT       = 'in_development';
    case DONE                 = 'done';
    case IN_HOMOLOGATION      = 'in_homologation';
    case IN_TEST              = 'in_test';
    case READY_FOR_PRODUCTION = 'ready_for_production';
    case IN_PRODUCTION        = 'in_production';
}
