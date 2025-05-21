<?php

namespace App\Domain\Companies\ViewModels;

use App\Constants\CompanyStatus;
use App\Support\ViewModels\ViewModel;

class EditViewModel extends ViewModel
{

    public function toArray(): array
    {
        return [
            'company' => $this->model(),
            'status' => CompanyStatus::getStatusList(),
        ];
    }
}
