<?php

namespace App\Enums;

use App\Attributes\Description;
use App\Models\Traits\AttributableEnum;

enum StatusEnum: string
{
    use AttributableEnum;

    #[Description('Complete')]
    case Complete = 'complete';

    #[Description('Pending')]
    case Pending  = 'pending';

    #[Description('Expired')]
    case Expired = 'expired';

    #[Description('Cancelled')]
    case Cancelled = 'cancelled';

    #[Description('Fail')]
    case Fail = 'fail';
}
