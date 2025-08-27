<?php


// namespace App\Http\Controllers;

// use App\Models\User;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\Request;

// class UserController extends Controller
// {
//     public function index()
//     {
//         $users = User::with(['roles', 'permissions'])->get();
//         return view('pages.user.index', compact('users'));
//     }

//     public function create()
//     {
//         $roles = Role::all();
//         $permissions = Permission::all();
//         return view('pages.user.create', compact('roles', 'permissions'));
//     }

//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'name'        => 'required',
//             'email'       => 'required|email|unique:users',
//             'password'    => 'required|min:6',
//             'role'        => 'required',
//             'permissions' => 'array'
//         ]);

//         $user = User::create([
//             'name'     => $validated['name'],
//             'email'    => $validated['email'],
//             'password' => Hash::make($validated['password']),
//         ]);

//         $user->assignRole($validated['role']);

//         if ($validated['role'] === 'user' && isset($validated['permissions'])) {
//             $user->givePermissionTo($validated['permissions']);
//         }

//         return redirect()->route('user.index')->with('success', 'User berhasil dibuat.');
//     }

//     public function edit($id)
//     {
//         $user = User::findOrFail($id);
//         $roles = Role::all();
//         $permissions = Permission::all();
//         $userPermissions = $user->permissions->pluck('name')->toArray();

//         return view('pages.user.edit', compact('user', 'roles', 'permissions', 'userPermissions'));
//     }

//     public function update(Request $request, $id)
//     {
//         $user = User::findOrFail($id);

//         $validated = $request->validate([
//             'name'        => 'required',
//             'email'       => 'required|email|unique:users,email,' . $user->id,
//             'role'        => 'required',
//             'permissions' => 'array'
//         ]);

//         $user->update([
//             'name'  => $validated['name'],
//             'email' => $validated['email'],
//         ]);

//         $user->syncRoles([$validated['role']]);

//         // Reset permission jika role-nya user
//         if ($validated['role'] === 'user') {
//             $user->syncPermissions($validated['permissions'] ?? []);
//         } else {
//             $user->syncPermissions([]); // bersihkan permission kalau admin
//         }

//         return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
//     }

//     public function destroy($id)
//     {
//         $user = User::findOrFail($id);
//         $user->delete();

//         return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
//     }
// }


// namespace App\Http\Controllers;

// use App\Models\User;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\Request;

// class UserController extends Controller
// {
//     public function index()
//     {
//         $users = User::with(['roles', 'permissions'])->get();
//         return view('pages.user.index', compact('users'));
//     }

//     public function create()
//     {
//         $roles = Role::all();
//         $permissions = Permission::all();
//         return view('pages.user.create', compact('roles', 'permissions'));
//     }

//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'name'          => 'required',
//             'email'         => 'required|email|unique:users',
//             'password'      => 'required|min:6',
//             'role'          => 'required',
//             'unit_kerja'    => 'required|string', // Perbaikan: Tambah validasi
//             'permissions'   => 'array'
//         ]);

//         $user = User::create([
//             'name'          => $validated['name'],
//             'email'         => $validated['email'],
//             'password'      => Hash::make($validated['password']),
//             'unit_kerja'    => $validated['unit_kerja'], // Perbaikan: Tambahkan unit_kerja
//         ]);

//         $user->assignRole($validated['role']);

//         if ($validated['role'] === 'user' && isset($validated['permissions'])) {
//             $user->givePermissionTo($validated['permissions']);
//         }

//         return redirect()->route('user.index')->with('success', 'User berhasil dibuat.');
//     }

//     public function edit($id)
//     {
//         $user = User::findOrFail($id);
//         $roles = Role::all();
//         $permissions = Permission::all();
//         $userPermissions = $user->permissions->pluck('name')->toArray();

//         return view('pages.user.edit', compact('user', 'roles', 'permissions', 'userPermissions'));
//     }

//     public function update(Request $request, $id)
//     {
//         $user = User::findOrFail($id);

//         $validated = $request->validate([
//             'name'          => 'required',
//             'email'         => 'required|email|unique:users,email,' . $user->id,
//             'role'          => 'required',
//             'unit_kerja'    => 'required|string', // Perbaikan: Tambah validasi
//             'permissions'   => 'array'
//         ]);

//         $user->update([
//             'name'          => $validated['name'],
//             'email'         => $validated['email'],
//             'unit_kerja'    => $validated['unit_kerja'], // Perbaikan: Tambahkan unit_kerja
//         ]);

//         $user->syncRoles([$validated['role']]);

//         if ($validated['role'] === 'user') {
//             $user->syncPermissions($validated['permissions'] ?? []);
//         } else {
//             $user->syncPermissions([]);
//         }

//         return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
//     }

//     public function destroy($id)
//     {
//         $user = User::findOrFail($id);
//         $user->delete();

//         return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
//     }
// }



// namespace App\Http\Controllers;

// use App\Models\User;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\Request;

// class UserController extends Controller
// {
//     public function index()
//     {
//         $users = User::with(['roles', 'permissions'])->get();
//         return view('pages.user.index', compact('users'));
//     }

//     public function create()
//     {
//         $roles = Role::all();
//         $permissions = Permission::all();
//         return view('pages.user.create', compact('roles', 'permissions'));
//     }

//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'name'          => 'required',
//             'email'         => 'required|email|unique:users',
//             'password'      => 'required|min:6',
//             'role'          => 'required',
//             'unit_kerja'    => 'required|string', // Perbaikan: Tambah validasi
//             'permissions'   => 'array'
//         ]);

//         $user = User::create([
//             'name'          => $validated['name'],
//             'email'         => $validated['email'],
//             'password'      => Hash::make($validated['password']),
//             'unit_kerja'    => $validated['unit_kerja'], // Perbaikan: Tambahkan unit_kerja
//         ]);

//         $user->assignRole($validated['role']);

//         if ($validated['role'] === 'user' && isset($validated['permissions'])) {
//             $user->givePermissionTo($validated['permissions']);
//         }

//         return redirect()->route('user.index')->with('success', 'User berhasil dibuat.');
//     }

//     public function edit($id)
//     {
//         $user = User::findOrFail($id);
//         $roles = Role::all();
//         $permissions = Permission::all();
//         $userPermissions = $user->permissions->pluck('name')->toArray();

//         return view('pages.user.edit', compact('user', 'roles', 'permissions', 'userPermissions'));
//     }

//     public function update(Request $request, $id)
//     {
//         $user = User::findOrFail($id);

//         $validated = $request->validate([
//             'name'          => 'required',
//             'email'         => 'required|email|unique:users,email,' . $user->id,
//             'role'          => 'required',
//             'unit_kerja'    => 'required|string', // Perbaikan: Tambah validasi
//             'permissions'   => 'array'
//         ]);

//         $user->update([
//             'name'          => $validated['name'],
//             'email'         => $validated['email'],
//             'unit_kerja'    => $validated['unit_kerja'], // Perbaikan: Tambahkan unit_kerja
//         ]);

//         $user->syncRoles([$validated['role']]);

//         if ($validated['role'] === 'user') {
//             $user->syncPermissions($validated['permissions'] ?? []);
//         } else {
//             $user->syncPermissions([]);
//         }

//         return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
//     }

//     public function destroy($id)
//     {
//         $user = User::findOrFail($id);
//         $user->delete();

//         return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
//     }
// }


// namespace App\Http\Controllers;

// use App\Models\User;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\Request;

// class UserController extends Controller
// {
//     public function index()
//     {
//         $users = User::with(['roles', 'permissions'])->get();
//         return view('pages.user.index', compact('users'));
//     }

//     public function create()
//     {
//         $roles = Role::all(); // semua role termasuk yanum
//         $permissions = Permission::all();
//         return view('pages.user.create', compact('roles', 'permissions'));
//     }

//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'name'          => 'required',
//             'email'         => 'required|email|unique:users',
//             'password'      => 'required|min:6',
//             'role'          => 'required',
//             'unit_kerja'    => 'required|string',
//             'permissions'   => 'array'
//         ]);

//         $user = User::create([
//             'name'          => $validated['name'],
//             'email'         => $validated['email'],
//             'password'      => Hash::make($validated['password']),
//             'unit_kerja'    => $validated['unit_kerja'],
//         ]);

//         $user->assignRole($validated['role']);

//         // Kalau role adalah user atau yanum → izinkan pilih permission
//         if (in_array($validated['role'], ['user', 'yanum']) && isset($validated['permissions'])) {
//             $user->givePermissionTo($validated['permissions']);
//         }

//         return redirect()->route('user.index')->with('success', 'User berhasil dibuat.');
//     }

//     public function edit($id)
//     {
//         $user = User::findOrFail($id);
//         $roles = Role::all();
//         $permissions = Permission::all();
//         $userPermissions = $user->permissions->pluck('name')->toArray();

//         return view('pages.user.edit', compact('user', 'roles', 'permissions', 'userPermissions'));
//     }

//     public function update(Request $request, $id)
//     {
//         $user = User::findOrFail($id);

//         $validated = $request->validate([
//             'name'          => 'required',
//             'email'         => 'required|email|unique:users,email,' . $user->id,
//             'role'          => 'required',
//             'unit_kerja'    => 'required|string',
//             'permissions'   => 'array'
//         ]);

//         $user->update([
//             'name'          => $validated['name'],
//             'email'         => $validated['email'],
//             'unit_kerja'    => $validated['unit_kerja'],
//         ]);

//         $user->syncRoles([$validated['role']]);

//         // Kalau role adalah user atau yanum → sync permissions
//         if (in_array($validated['role'], ['user', 'yanum'])) {
//             $user->syncPermissions($validated['permissions'] ?? []);
//         } else {
//             $user->syncPermissions([]);
//         }

//         return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
//     }

//     public function destroy($id)
//     {
//         $user = User::findOrFail($id);
//         $user->delete();

//         return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
//     }
// }



// namespace App\Http\Controllers;

// use App\Models\User;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\Request;

// class UserController extends Controller
// {
//     public function index()
//     {
//         $users = User::with(['roles', 'permissions'])->get();
//         return view('pages.user.index', compact('users'));
//     }

//     public function create()
//     {
//         $roles = Role::all();
//         $permissions = Permission::all();
//         return view('pages.user.create', compact('roles', 'permissions'));
//     }

//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'name'          => 'required',
//             'email'         => 'required|email|unique:users',
//             'password'      => 'required|min:6',
//             'role'          => 'required',
//             'unit_kerja'    => 'required|string',
//             'permissions'   => 'array'
//         ]);

//         $user = User::create([
//             'name'          => $validated['name'],
//             'email'         => $validated['email'],
//             'password'      => Hash::make($validated['password']),
//             'unit_kerja'    => $validated['unit_kerja'],
//         ]);

//         $user->assignRole($validated['role']);

//         // Semua role kecuali admin → permission diatur manual
//         if ($validated['role'] !== 'admin' && isset($validated['permissions'])) {
//             $user->syncPermissions($validated['permissions']);
//         }

//         return redirect()->route('user.index')->with('success', 'User berhasil dibuat.');
//     }

//     public function edit($id)
//     {
//         $user = User::findOrFail($id);
//         $roles = Role::all();
//         $permissions = Permission::all();
//         $userPermissions = $user->permissions->pluck('name')->toArray();

//         return view('pages.user.edit', compact('user', 'roles', 'permissions', 'userPermissions'));
//     }

//     public function update(Request $request, $id)
//     {
//         $user = User::findOrFail($id);

//         $validated = $request->validate([
//             'name'          => 'required',
//             'email'         => 'required|email|unique:users,email,' . $user->id,
//             'role'          => 'required',
//             'unit_kerja'    => 'required|string',
//             'permissions'   => 'array'
//         ]);

//         $user->update([
//             'name'          => $validated['name'],
//             'email'         => $validated['email'],
//             'unit_kerja'    => $validated['unit_kerja'],
//         ]);

//         $user->syncRoles([$validated['role']]);

//         if ($validated['role'] !== 'admin') {
//             $user->syncPermissions($validated['permissions'] ?? []);
//         } else {
//             $user->syncPermissions([]);
//         }

//         return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
//     }

//     public function destroy($id)
//     {
//         $user = User::findOrFail($id);
//         $user->delete();

//         return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
//     }
// }


// namespace App\Http\Controllers;

// use App\Models\User;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\Request;

// class UserController extends Controller
// {
//     /**
//      * Menampilkan daftar user dengan paginasi.
//      */
//     public function index()
//     {
//         // Menggunakan paginate(5) untuk menampilkan maksimal 5 user per halaman.
//         // Ini sesuai dengan request di Blade dan lebih efisien.
//         $users = User::with(['roles', 'permissions'])->paginate(5);
//         return view('pages.user.index', compact('users'));
//     }

//     /**
//      * Menampilkan form untuk membuat user baru.
//      */
//     public function create()
//     {
//         $roles = Role::all();
//         $permissions = Permission::all();
//         return view('pages.user.create', compact('roles', 'permissions'));
//     }

//     /**
//      * Menyimpan user baru ke database.
//      */
//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'name'          => 'required',
//             'email'         => 'required|email|unique:users',
//             'password'      => 'required|min:6',
//             'role'          => 'required',
//             'unit_kerja'    => 'required|string',
//             'permissions'   => 'array'
//         ]);

//         $user = User::create([
//             'name'          => $validated['name'],
//             'email'         => $validated['email'],
//             'password'      => Hash::make($validated['password']),
//             'unit_kerja'    => $validated['unit_kerja'],
//         ]);

//         $user->assignRole($validated['role']);

//         if ($validated['role'] !== 'admin' && isset($validated['permissions'])) {
//             $user->syncPermissions($validated['permissions']);
//         }

//         return redirect()->route('user.index')->with('success', 'User berhasil dibuat.');
//     }

//     /**
//      * Menampilkan form untuk mengedit user yang ada.
//      * Menggunakan Route Model Binding untuk mendapatkan objek User.
//      */
//     public function edit(User $user)
//     {
//         $roles = Role::all();
//         $permissions = Permission::all();
//         $userPermissions = $user->permissions->pluck('name')->toArray();

//         return view('pages.user.edit', compact('user', 'roles', 'permissions', 'userPermissions'));
//     }

//     /**
//      * Memperbarui user di database.
//      * Menggunakan Route Model Binding untuk mendapatkan objek User.
//      */
//     public function update(Request $request, User $user)
//     {
//         $validated = $request->validate([
//             'name'          => 'required',
//             'email'         => 'required|email|unique:users,email,' . $user->id,
//             'password'      => 'nullable|min:6', // Password dibuat nullable
//             'role'          => 'required',
//             'unit_kerja'    => 'required|string',
//             'permissions'   => 'array'
//         ]);

//         $updateData = [
//             'name'          => $validated['name'],
//             'email'         => $validated['email'],
//             'unit_kerja'    => $validated['unit_kerja'],
//         ];

//         // Jika password diisi, hash password baru dan tambahkan ke data update
//         if ($request->filled('password')) {
//             $updateData['password'] = Hash::make($validated['password']);
//         }

//         $user->update($updateData);

//         $user->syncRoles([$validated['role']]);

//         // Atur permission berdasarkan role
//         if ($validated['role'] === 'admin') {
//             $user->syncPermissions([]); // Hapus semua permission jika role adalah admin
//         } else {
//             $user->syncPermissions($validated['permissions'] ?? []);
//         }

//         return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
//     }

//     /**
//      * Menghapus user dari database.
//      * Menggunakan Route Model Binding untuk mendapatkan objek User.
//      */
//     public function destroy(User $user)
//     {
//         $user->delete();
//         return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
//     }
// }


// namespace App\Http\Controllers;

// use App\Models\User;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\Request;

// class UserController extends Controller
// {
//     /**
//      * Menampilkan daftar user dengan paginasi, search, dan per page.
//      */
//     public function index(Request $request)
//     {
//         $search = $request->input('search');
//         $perPage = $request->input('per_page', 10); // default 10

//         $users = User::with(['roles', 'permissions'])
//             ->when($search, function ($query) use ($search) {
//                 $query->where('name', 'like', "%{$search}%")
//                     ->orWhere('email', 'like', "%{$search}%")
//                     ->orWhere('unit_kerja', 'like', "%{$search}%");
//             })
//             ->paginate($perPage)
//             ->appends(['search' => $search, 'per_page' => $perPage]);

//         return view('pages.user.index', compact('users', 'search', 'perPage'));
//     }

//     /**
//      * Menampilkan form untuk membuat user baru.
//      */
//     public function create()
//     {
//         $roles = Role::all();
//         $permissions = Permission::all();
//         return view('pages.user.create', compact('roles', 'permissions'));
//     }

//     /**
//      * Menyimpan user baru ke database.
//      */
//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'name'          => 'required',
//             'email'         => 'required|email|unique:users',
//             'password'      => 'required|min:6',
//             'role'          => 'required',
//             'unit_kerja'    => 'required|string',
//             'permissions'   => 'array'
//         ]);

//         $user = User::create([
//             'name'          => $validated['name'],
//             'email'         => $validated['email'],
//             'password'      => Hash::make($validated['password']),
//             'unit_kerja'    => $validated['unit_kerja'],
//         ]);

//         $user->assignRole($validated['role']);

//         if ($validated['role'] !== 'admin' && isset($validated['permissions'])) {
//             $user->syncPermissions($validated['permissions']);
//         }

//         return redirect()->route('user.index')->with('success', 'User berhasil dibuat.');
//     }

//     /**
//      * Menampilkan form untuk mengedit user yang ada.
//      */
//     public function edit(User $user)
//     {
//         $roles = Role::all();
//         $permissions = Permission::all();
//         $userPermissions = $user->permissions->pluck('name')->toArray();

//         return view('pages.user.edit', compact('user', 'roles', 'permissions', 'userPermissions'));
//     }

//     /**
//      * Memperbarui user di database.
//      */
//     public function update(Request $request, User $user)
//     {
//         $validated = $request->validate([
//             'name'          => 'required',
//             'email'         => 'required|email|unique:users,email,' . $user->id,
//             'password'      => 'nullable|min:6',
//             'role'          => 'required',
//             'unit_kerja'    => 'required|string',
//             'permissions'   => 'array'
//         ]);

//         $updateData = [
//             'name'          => $validated['name'],
//             'email'         => $validated['email'],
//             'unit_kerja'    => $validated['unit_kerja'],
//         ];

//         if ($request->filled('password')) {
//             $updateData['password'] = Hash::make($validated['password']);
//         }

//         $user->update($updateData);

//         $user->syncRoles([$validated['role']]);

//         if ($validated['role'] === 'admin') {
//             $user->syncPermissions([]);
//         } else {
//             $user->syncPermissions($validated['permissions'] ?? []);
//         }

//         return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
//     }

//     /**
//      * Menghapus user.
//      */
//     public function destroy(User $user)
//     {
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
    /**
     * Menampilkan daftar user dengan paginasi, search, dan per page.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 5); // default 5

        $users = User::with(['roles', 'permissions'])
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('unit_kerja', 'like', "%{$search}%");
            })
            ->paginate($perPage)
            ->appends(['search' => $search, 'per_page' => $perPage]);

        return view('pages.user.index', compact('users', 'search', 'perPage'));
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
            'name'          => 'required',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:6',
            'role'          => 'required',
            'unit_kerja'    => 'required|string',
            'permissions'   => 'array'
        ]);

        $user = User::create([
            'name'          => $validated['name'],
            'email'         => $validated['email'],
            'password'      => Hash::make($validated['password']),
            'unit_kerja'    => $validated['unit_kerja'],
        ]);

        $user->assignRole($validated['role']);

        if ($validated['role'] !== 'admin' && isset($validated['permissions'])) {
            $user->syncPermissions($validated['permissions']);
        }

        return redirect()->route('user.index')->with('success', 'User berhasil dibuat.');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $userPermissions = $user->permissions->pluck('name')->toArray();

        return view('pages.user.edit', compact('user', 'roles', 'permissions', 'userPermissions'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'          => 'required',
            'email'         => 'required|email|unique:users,email,' . $user->id,
            'password'      => 'nullable|min:6',
            'role'          => 'required',
            'unit_kerja'    => 'required|string',
            'permissions'   => 'array'
        ]);

        $updateData = [
            'name'          => $validated['name'],
            'email'         => $validated['email'],
            'unit_kerja'    => $validated['unit_kerja'],
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($validated['password']);
        }

        $user->update($updateData);

        $user->syncRoles([$validated['role']]);

        if ($validated['role'] === 'admin') {
            $user->syncPermissions([]);
        } else {
            $user->syncPermissions($validated['permissions'] ?? []);
        }

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}
