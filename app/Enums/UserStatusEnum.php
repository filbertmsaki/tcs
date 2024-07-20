<?php

namespace App\Enums;

use App\Attributes\Description;
use App\Models\Traits\AttributableEnum;

enum UserStatusEnum: string
{
    use AttributableEnum;

    #[Description('Active')]
    case Active = 'active';

    #[Description('In Active')]
    case Inactive  = 'inactive';

    #[Description('Locked')]
    case Locked = 'locked';

    #[Description('Suspended')]
    case Suspended = 'suspended';

    #[Description('Blocked')]
    case Blocked = 'blocked';

    #[Description('Terminated')]
    case Terminated = 'terminated';
}
