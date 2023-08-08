<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Region;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\User\UserStoreRequest;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with(['region', 'roles'])->get();
        return view('user.index', compact('users'));
    }


    public function create()
    {
        $roles = Role::all();
        $regions = Region::all();
        return view('user.create', compact('roles', 'regions'));
    }


    public function store(UserStoreRequest $request)
    {
        $request->validated();

        $user = User::create([
            'name' => $request->name,
            'username' => Str::lower($request->username),
            'region_id' => $request->region_id,
            'email' => $request->email,
            'password' => bcrypt(Str::lower($request->username)),
        ]);
        $user->assignRole($request->role);
        return redirect()
            ->route('users.index')->withSuccess('Data User Berhasil Disimpan');
    }




    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()
            ->withSuccess('Data User Berhasil Di Hapus');
    }
}
