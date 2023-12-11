<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class EmployeeController extends Controller
{
    public function create(Company $company): View
    {
        return view('employee.create', ['company' => $company]);
    }

    public function edit(Employee $employee, Company $company): View
    {
        return view('employee.edit', ['employee' => $employee, 'company' => $company]);
    }

    public function show(Employee $employee): View
    {
        return view('employee.show', ['employee' => $employee]);
    }

    public function store(Request $request, Employee $employee, Company $company)
    {
        $formFields = $request->validate(
            [
                'first_name' => 'required|min:3',
                'last_name' => 'required|min:3',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:255'
            ]
        );

        $formFields['company_id'] = $company->id;
        $employee = Employee::create($formFields);

        if ($employee) {
            return back();
        }
        return back();
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();
        return back()->with('message', 'Company deleted');
    }

    public function update(Request $request, Employee $employee): RedirectResponse
    {
        $formFields = $request->validate(
            [
                'first_name' => 'required|min:3',
                'last_name' => 'required|min:3',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:255'
            ]
        );

        $employee->update($formFields);

        if ($employee) {
            return redirect(route('company.show', ['company' => $employee->company_id]));
        }
        return back();
    }
}
