<?php

namespace App\Domain\Companies\Actions;

use App\Domain\Companies\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;

class ListCompanies
{
    public static function execute(array $params): LengthAwarePaginator
    {
        return Company::select(
            'id',
            'nit',
            'name',
            'status',
            'phone_number',
            'address'
            )->when($params['filter'], function ($query, $filter) {
                    return $query->where(function ($query) use ($filter) {
                        $query->where('name', 'like', '%'.$filter.'%')
                            ->orWhere('nit', 'like', '%'.$filter.'%')
                            ->orWhere('phone_number', 'like', '%'.$filter.'%')
                            ->orWhere('address', 'like', '%'.$filter.'%')
                            ->orWhere('status', 'like', '%'.$filter.'%');
                    });
            })->latest('id')->paginate(10);
    }
}
