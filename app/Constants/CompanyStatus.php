<?php

namespace App\Constants;

interface CompanyStatus
{
    const ACTIVE = 'ACTIVE';

    const INACTIVE = 'INACTIVE';

    public static function getStatusList(): array
    {
        return [
            self::ACTIVE,
            self::INACTIVE,
        ];
    }
}
