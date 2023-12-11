<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Facades\Image;
use Mail;


class CompanyController extends Controller
{

    public function index(): View
    {
        $companies = Company::paginate(10);
        return view('company.index', ['companies' => $companies]);
    }

    public function create(): View
    {
        return view('company.create');
    }

    public function edit(Company $company): View
    {
        return view('company.edit', ['company' => $company]);
    }

    public function show(Company $company): View
    {
        $employees = Employee::where('company_id', '=', $company->id)
            ->with(['company'])->paginate(10);
        return view('company.show', ['company' => $company, 'employees' => $employees]);
    }

    public function destroy(Company $company): RedirectResponse
    {
        $destinationPath = storage_path(config('image.company_avatar_storage_path'));
        $fileName = $destinationPath . '/' . $company->image;
        File::delete($fileName);
        $company->delete();
        return back()->with('message', 'Company deleted');
    }

    public function update(Request $request, Company $company): RedirectResponse
    {
        $formFields = $request->validate(
            [
                'name' => 'required|min:3',
                'email' => 'nullable|email|max:255',
                'website' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            ]
        );

        $company->update($formFields);

        if (isset($formFields['image']) && gettype($formFields['image']) == 'object') {
            $company->image = $this->imageSave($company, $formFields['image']);
            $company->update();
        }

        if ($company) {
            return redirect(route('company.index'));
        }
        return back()->with('message', 'Registration error');
    }

    public function store(Request $request): RedirectResponse
    {
        $formFields = $request->validate(
            [
                'name' => 'required|min:3',
                'email' => ['required', 'email', Rule::unique('companies', 'email')],
                'website' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            ]
        );

        $company = Company::create($formFields);

        if (gettype($formFields['image']) == 'object') {
            $company->image = $this->imageSave($company, $formFields['image']);
            $company->update();
        }

        if ($company) {
            $this->notifyMail($company->name);
            return redirect(route('company.create'));
        }
        return back()->with('message', 'Registration error')->with('status', 'userRegistrationFail');
    }

    private function imageSave(Company $company, UploadedFile $image): string
    {
        $picture = Image::make($image->get());
        $picture->fit(200); // https://image.intervention.io/v2
        $imageName = $company->id . '-' . time() . '.png';
        $destinationPath = storage_path(config('image.company_avatar_storage_path'));
        File::makeDirectory($destinationPath, 0777, true, true);
        $picture->save($destinationPath . $imageName);
        File::delete($destinationPath . $company->image);
        return $imageName;
    }

    private function notifyMail($company_name)
    {
        $data = array('name' => $company_name);
        Mail::send('mail', $data, function ($message) {
            $message->to('abc@gmail.com', 'Company admin')->subject('New registration');
            $message->from('xyz@gmail.com', 'Mézga Géza');
        });
    }
}
