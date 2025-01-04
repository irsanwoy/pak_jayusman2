<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data['users'] = User::all();
        $data['roles'] = Role::all();
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $data['users'] = $data['users']->filter(function ($user) use ($search) {
                return stripos($user->name, $search) !== false || stripos($user->email, $search) !== false;
            });
        }
    
        $data['search'] = $request->input('search');
    
        // Tidak perlu menggunakan compact
        return view('users.index', $data);
    }

    public function create()
    {
        $roles = Role::all(); // Ambil semua role
        return view('users.create', compact('roles'));
    }


    public function assignRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        $user->syncRoles($request->role);

        return redirect()->back()->with('success', 'Role berhasil diassign!');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|min:8|confirmed',
        'role' => 'required|exists:roles,name', // Validasi role harus ada
    ]);

    // Buat user baru
    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    // Assign role ke user
    $user->assignRole($validated['role']);

    $notification = [
        'message' => 'User berhasil ditambahkan!',
        'alert-type' => 'success',
    ];

    return redirect()->route('users.index')->with($notification);
}
    public function edit($id)
{
    $data['user'] = User::findOrFail($id);
    $data['roles'] = Role::all(); // Ambil semua role untuk ditampilkan di view
    return view('users.edit', $data);
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $id,
        'password' => 'nullable|min:8',
        'role' => 'required|exists:roles,name', // Validasi role harus ada
    ]);

    // Hash password jika diisi
    if (!empty($validated['password'])) {
        $validated['password'] = Hash::make($validated['password']);
    } else {
        unset($validated['password']);
    }

    // Update data user
    $user->update($validated);

    // Assign role ke user
    $user->syncRoles($validated['role']);

    // Redirect dengan notifikasi
    $notification = [
        'message' => 'User berhasil diupdate!',
        'alert-type' => 'success',
    ];

    return redirect()->route('users.index')->with($notification);
}

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        $notification = [
            'message' => 'User berhasil dihapus!',
            'alert-type' => 'success',
        ];

        return redirect()->route('users.index')->with($notification);
    }
}
