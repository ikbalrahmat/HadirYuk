<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class UserController extends Controller
// {
//     public function index()
//     {
//         return view('pages.user.index');
//     }
// }





// namespace App\Http\Controllers;

// use App\Models\User;
// use Spatie\Permission\Models\Role;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

// class UserController extends Controller
// {
//     public function index()
//     {
//         $users = User::with('roles')->get();
//         return view('pages.user.index', compact('users'));
//     }

//     public function create()
//     {
//         $roles = Role::all();
//         return view('pages.user.create', compact('roles'));
//     }

//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'name' => 'required',
//             'email' => 'required|email|unique:users',
//             'password' => 'required|min:6',
//             'role' => 'required'
//         ]);

//         $user = User::create([
//             'name' => $validated['name'],
//             'email' => $validated['email'],
//             'password' => Hash::make($validated['password']),
//         ]);

//         $user->assignRole($validated['role']);

//         return redirect()->route('user.index')->with('success', 'User berhasil dibuat.');
//     }
// }




// namespace App\Http\Controllers;

// use App\Models\User;
// use Spatie\Permission\Models\Role;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

// class UserController extends Controller
// {
//     public function index()
//     {
//         $users = User::with('roles')->get();
//         return view('pages.user.index', compact('users'));
//     }

//     public function create()
//     {
//         $roles = Role::all();
//         return view('pages.user.create', compact('roles'));
//     }

//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'name'     => 'required',
//             'email'    => 'required|email|unique:users',
//             'password' => 'required|min:6',
//             'role'     => 'required'
//         ]);

//         $user = User::create([
//             'name'     => $validated['name'],
//             'email'    => $validated['email'],
//             'password' => Hash::make($validated['password']),
//         ]);

//         $user->assignRole($validated['role']);

//         return redirect()->route('user.index')->with('success', 'User berhasil dibuat.');
//     }

//     public function edit($id)
//     {
//         $user  = User::findOrFail($id);
//         $roles = Role::all();

//         return view('pages.user.edit', compact('user', 'roles'));
//     }

//     public function update(Request $request, $id)
//     {
//         $user = User::findOrFail($id);

//         $validated = $request->validate([
//             'name'  => 'required',
//             'email' => 'required|email|unique:users,email,' . $user->id,
//             'role'  => 'required'
//         ]);

//         $user->update([
//             'name'  => $validated['name'],
//             'email' => $validated['email'],
//         ]);

//         $user->syncRoles([$validated['role']]);

//         return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
//     }

//     public function destroy($id)
//     {
//         $user = User::findOrFail($id);
//         $user->delete();

//         return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
//     }
// }



namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['roles', 'permissions'])->get();
        return view('pages.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('pages.user.create', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required',
            'email'       => 'required|email|unique:users',
            'password'    => 'required|min:6',
            'role'        => 'required',
            'permissions' => 'array'
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $user->assignRole($validated['role']);

        if ($validated['role'] === 'user' && isset($validated['permissions'])) {
            $user->givePermissionTo($validated['permissions']);
        }

        return redirect()->route('user.index')->with('success', 'User berhasil dibuat.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $permissions = Permission::all();
        $userPermissions = $user->permissions->pluck('name')->toArray();

        return view('pages.user.edit', compact('user', 'roles', 'permissions', 'userPermissions'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required',
            'email'       => 'required|email|unique:users,email,' . $user->id,
            'role'        => 'required',
            'permissions' => 'array'
        ]);

        $user->update([
            'name'  => $validated['name'],
            'email' => $validated['email'],
        ]);

        $user->syncRoles([$validated['role']]);

        // Reset permission jika role-nya user
        if ($validated['role'] === 'user') {
            $user->syncPermissions($validated['permissions'] ?? []);
        } else {
            $user->syncPermissions([]); // bersihkan permission kalau admin
        }

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}
