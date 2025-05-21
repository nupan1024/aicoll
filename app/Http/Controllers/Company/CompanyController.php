<?php

namespace App\Http\Controllers\Company;

use App\Domain\Companies\Actions\CreateCompany;
use App\Domain\Companies\Actions\DeleteCompany;
use App\Domain\Companies\Actions\UpdateCompany;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CreateCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Domain\Companies\Models\Company;
use App\Support\ViewModels\Company\IndexViewModel;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class CompanyController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Companies/Index', app(IndexViewModel::class));
    }

    public function store(CreateCompanyRequest $request): RedirectResponse
    {
        CreateCompany::execute($request->validated());

        return redirect()->route('dashboard')->with([
            'message' => __('companies.success_create'),
            'type' => 'success',
        ]);
    }

    public function edit(UpdateCompanyRequest $request, Company $company): RedirectResponse
    {
        UpdateCompany::execute($request->validated(), $company);

        return redirect()->route('dashboard')->with([
            'message' => __('companies.success_update'),
            'type' => 'success',
        ]);
    }

    public function delete(Company $company): RedirectResponse
    {
        DeleteCompany::execute($company);

        return redirect()->route('dashboard')->with([
            'message' => __('companies.success_delete'),
            'type' => 'success',
        ]);
    }
}
