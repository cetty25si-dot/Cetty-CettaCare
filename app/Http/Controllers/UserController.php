<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            return redirect()->route('user.index')
                ->with('success', 'User berhasil ditambahkan!');
        } catch (QueryException $e) {
            return back()->withInput($request->except([
                'password',
                'password_confirmation',
            ]))->with('error', 'User gagal ditambahkan. Silakan coba kembali.');
        }
    }

    public function show(string $id)
    {
        return redirect()->route('user.index');
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        try {
            $user->name = $validated['name'];
            $user->email = $validated['email'];

            // Password hanya diubah jika kolom password diisi.
            if (!empty($validated['password'])) {
                $user->password = Hash::make($validated['password']);
            }

            $user->save();

            return redirect()->route('user.index')
                ->with('success', 'User berhasil diperbarui!');
        } catch (QueryException $e) {
            return back()->withInput($request->except([
                'password',
                'password_confirmation',
            ]))->with('error', 'User gagal diperbarui. Silakan coba kembali.');
        }
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        try {
            $user->delete();

            return redirect()->route('user.index')
                ->with('success', 'User berhasil dihapus!');
        } catch (QueryException $e) {
            return redirect()->route('user.index')
                ->with('error', 'User gagal dihapus. Silakan coba kembali.');
        }
    }
}
