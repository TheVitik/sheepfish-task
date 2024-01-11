<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Services\LogoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CompanyController extends Controller
{
    const PAGE_SIZE = 10;

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $companies = Company::paginate(self::PAGE_SIZE);

        return view('companies.index', [
            'companies' => $companies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request, LogoService $logoService): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('logo')) {
            $path = $logoService->upload($request->file('logo'));
            $data['logo'] = $path;
        }

        Company::create($data);

        return redirect()->route('companies.index')->with('success', 'Company created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company): View
    {
        return view('companies.show', [
            'company' => $company,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company): View
    {
        return view('companies.edit', [
            'company' => $company,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company, LogoService $logoService): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('logo')) {
            $path = $logoService->upload($request->file('logo'));
            $data['logo'] = $path;
        }

        $company->update($data);

        return redirect()->route('companies.index')->with('success', 'Company updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company): RedirectResponse
    {
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted.');
    }
}
