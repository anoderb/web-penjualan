<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\M_menu;
use App\Models\M_user;
use App\Models\M_level;

class C_user extends Controller
{
    protected $menu_byidlevel;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->check() && auth()->user()->id_level) {
                $this->menu_byidlevel = M_menu::menu_byidlevel(auth()->user()->id_level);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $users = M_user::with('level')->orderBy('id', 'DESC')->get();
        $levels = M_level::orderBy('level_name', 'ASC')->get();

        $data = [
            'title'          => 'Data Pengguna',
            'menu_byidlevel' => $this->menu_byidlevel,
            'users'          => $users,
            'levels'         => $levels
        ];

        return view('user.V_user', $data);
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'no_hp'    => 'required|string',
            'id_level' => 'required|exists:tb_levels,id_level',
            'status'   => 'required|in:Aktif,Tidak Aktif',
        ], [
            Session::flash('error', 'Data gagal ditambah.')
        ]);

        $user           = new M_user();
        $user->name     = $validatedData['name'];
        $user->email    = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->no_hp    = $validatedData['no_hp'];
        $user->id_level = $validatedData['id_level'];
        $user->status   = $validatedData['status'];
        $user->save();

        return redirect()->route('user_index')->with('success', 'Data berhasil ditambah.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //   
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'no_hp'    => 'required|string',
            'id_level' => 'required|exists:tb_levels,id_level',
            'status'   => 'required|in:Aktif,Tidak Aktif',
        ], [
            Session::flash('error', 'Data gagal diperbarui.')
        ]);

        $user        = M_user::findOrFail($id);
        $user->name  = $validatedData['name'];
        $user->email = $validatedData['email'];
        if ($request->filled('password')) {
            $user->password = bcrypt($validatedData['password']);
        }
        $user->no_hp    = $validatedData['no_hp'];
        $user->id_level = $validatedData['id_level'];
        $user->status   = $validatedData['status'];
        $user->save();

        return redirect()->route('user_index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $user = M_user::findOrFail($id);
        $user->delete();

        return redirect()->route('user_index')->with('success', 'Data berhasil dihapus.');
    }
}
