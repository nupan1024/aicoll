<?php

namespace App\Domain\Companies\Models;

use App\Constants\CompanyStatus;
use Database\Factories\CompanyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'nit',
        'name',
        'address',
        'phone_number',
        'status',
    ];

    public function getCompaniesActive()
    {
        return $this->where('status', CompanyStatus::ACTIVE)->get();
    }

    protected static function newFactory(): CompanyFactory
    {
        return CompanyFactory::new();
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            if ($model->isDirty('nit')) {
                throw new \Exception('NIT cannot be updated');
            }
        });
    }
}
