<?php
namespace Modules\AdminSite\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SkillController extends Controller
{
    public function list()
    {
        return view('adminsite::skills.list');
    }

    public function data()
    {
        return DataTables::of(Skill::query())->make(true);
    }

    public function show($id)
    {
        return Skill::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:skills,name'
        ]);

        $data = $request->only(['name']);

        Skill::create($data);

        return response()->json(true);
    }

    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:skills,name,' . $skill->id
        ]);

        $data = $request->only(['name']);

        $skill->update($data);

        return response()->json(true);
    }


    public function destroy($id)
    {
        Skill::findOrFail($id)->delete();
        return response()->json(true);
    }
}
