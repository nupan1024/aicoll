<?php

namespace App\Constants;

enum CompanyStatus: string
{
    case ACTIVE = 'Active';

    case INACTIVE = 'Inactive';

    public static function getStatusList(): array
    {
        return array_column(self::cases(), 'value');
    }
}
