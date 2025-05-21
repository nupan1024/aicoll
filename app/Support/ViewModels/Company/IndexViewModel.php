<?php

namespace App\Support\ViewModels\Company;

use App\Domain\Companies\Models\Company;
use App\Support\ViewModels\ViewModel;

class IndexViewModel extends ViewModel
{
    public function __construct()
    {
        parent::__construct(new Company);
    }

    public function toArray(): array
    {
        return [
            'companies' => Company::all(),
        ];
    }
}
