<?php

namespace Modules\AdminSite\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use App\Models\Company;
use App\Models\Skill;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VacancyController extends Controller
{
    public function list()
    {
        $companies = Company::orderBy('name')->get();
        $skills = Skill::orderBy('name')->get();
        return view('adminsite::vacancies.list', compact('companies', 'skills'));
    }

    public function data()
    {
        // Build the query with a left join and count the number of applications per vacancy
        $data = DB::table('vacancies')
            ->leftJoin('applications', 'vacancies.id', '=', 'applications.vacancy_id') // Left join with applications table
            ->leftJoin('companies', 'vacancies.company_id', '=', 'companies.id') // Left join with applications table
            ->select(
                'vacancies.id as id',
                'vacancies.title as job_title',
                'companies.name as company_name',
                'companies.contact_person as contact_person',
                'companies.phone as phone',
                'companies.email as email',
                'vacancies.num_views as num_views',
                'vacancies.created_at as created_at',
                DB::raw('COUNT(applications.id) as applications_count') // Count applications for each vacancy
            )
            ->groupBy('vacancies.id') // Group by vacancy columns
            ->get();

        // Return the data in DataTables format
        return DataTables::of($data)->make(true);
    }

    public function create()
    {
        $companies = Company::orderBy('name')->get();
        $skills = Skill::orderBy('name')->get();
        return view('admin.vacancies.create', compact('companies', 'skills'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'title' => 'required|string|max:255',
            'salary_min' => 'required|numeric',
            'salary_max' => 'required|numeric',
            'location' => 'required|in:onsite,remote,hybrid',
            'vacancy_type' => 'required|in:full_time,part_time,contract,internship',
            'experience_level' => 'required|in:junior,mid,senior,lead',
            'is_active' => 'required|in:0,1',
            'skills' => 'required|array',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'description' => 'required|string',
        ]);

        $vacancy = Vacancy::create($validated);
        
        $skillIds = [];

        foreach ($request->skills ?? [] as $skill) {
            if (is_numeric($skill)) {
                // existing skill
                $skillIds[] = (int) $skill;
            } else {
                // new skill entered by user
                $newSkill = \App\Models\Skill::firstOrCreate(['name' => $skill]);
                $skillIds[] = $newSkill->id;
            }
        }

        // Sync pivot table
        $vacancy->Skills()->sync($skillIds);

        return response()->json(true);
    }

    public function show($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->skills_id = $vacancy->Skills->pluck('id');
        return $vacancy;
    }

    public function update(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);

        $validated = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'title' => 'required|string|max:255',
            'salary_min' => 'required|numeric',
            'salary_max' => 'required|numeric',
            'location' => 'required|in:onsite,remote,hybrid',
            'vacancy_type' => 'required|in:full_time,part_time,contract,internship',
            'experience_level' => 'required|in:junior,mid,senior,lead',
            'is_active' => 'nullable|boolean',
            'skills' => 'required|array',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'description' => 'required|string',
            'is_active' => 'required|in:0,1',
        ]);

        $vacancy->update($validated);
        $skillIds = [];

        foreach ($request->skills ?? [] as $skill) {
            if (is_numeric($skill)) {
                // existing skill
                $skillIds[] = (int) $skill;
            } else {
                // new skill entered by user
                $newSkill = \App\Models\Skill::firstOrCreate(['name' => $skill]);
                $skillIds[] = $newSkill->id;
            }
        }

        // Sync pivot table
        $vacancy->Skills()->sync($skillIds);

        return response()->json(true);
    }

    public function destroy(Vacancy $vacancy)
    {
        $vacancy->skills()->detach();
        $vacancy->delete();

        return redirect()->route('admin.vacancies.index')->with('success', 'Vacancy deleted successfully.');
    }
}
