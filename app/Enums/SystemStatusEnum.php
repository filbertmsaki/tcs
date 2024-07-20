<?php

namespace App\Enums;

use App\Attributes\Description;
use App\Models\Traits\AttributableEnum;

enum SystemStatusEnum: string
{
    use AttributableEnum;

    #[Description('Active')]
    case Active = 'active';

    #[Description('In Active')]
    case Inactive  = 'inactive';
}
