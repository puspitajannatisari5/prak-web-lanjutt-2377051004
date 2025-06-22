<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\Kelas;

class UserController extends Controller
{
    // Method untuk menampilkan form create
    public function create()
    {
        // Ambil semua data kelas untuk dropdown
        $kelas = Kelas::all();
        
        return view('create_user', compact('kelas'));
    }
    
    // Method untuk menyimpan data
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255|unique:user,npm',
            'kelas_id' => 'required|exists:kelas,id'
        ]);
        
        try {
            // Cara 1: Menggunakan mass assignment
            UserModel::create([
                'nama' => $request->nama,
                'npm' => $request->npm,
                'kelas_id' => $request->kelas_id
            ]);
            
            /* Cara 2: Menggunakan instance model
            $user = new UserModel();
            $user->nama = $request->nama;
            $user->npm = $request->npm;
            $user->kelas_id = $request->kelas_id;
            $user->save();
            */
            
            return redirect()->route('user.profile')->with('success', 'Data user berhasil disimpan!');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage())
                        ->withInput();
        }
    }
    
    // Method untuk menampilkan profile
    public function profile()
    {
        // Ambil semua data user dengan relasi kelas
        $users = UserModel::with('kelas')->get();
        
        return view('profile', compact('users'));
    }
}
