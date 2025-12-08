<?php
namespace Modules\AdminSite\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CompanyController extends Controller
{
    public function list()
    {
        return view('adminsite::companies.list');
    }

    public function datatable()
    {
        return DataTables::of(Company::query())->make(true);
    }

    public function show($id)
    {
        return Company::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->only(['name','website','contact_person','email','phone','contact_person','address','description']);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('companies', 'public');
        }

        Company::create($data);

        return response()->json(true);
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->only(['name','website','contact_person','email','phone','contact_person', 'address','description']);

        if ($request->hasFile('logo')) {
            // Optionally delete old logo
            if ($company->logo) \Storage::disk('public')->delete($company->logo);
            $data['logo'] = $request->file('logo')->store('companies', 'public');
        }

        $company->update($data);

        return response()->json(true);
    }


    public function destroy($id)
    {
        Company::findOrFail($id)->delete();
        return response()->json(true);
    }
}
