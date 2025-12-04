<?php
namespace Modules\AdminSite\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list()
    {
        return view('adminsite::user.list');
    }

    public function datatable()
    {
        return DataTables::of(User::query())->make(true);
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(true);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => "required|email|unique:users,email,$id",
            'role' => 'required'
        ]);

        $user->update($request->only('name', 'email', 'role'));

        return response()->json(true);
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json(true);
    }
}
