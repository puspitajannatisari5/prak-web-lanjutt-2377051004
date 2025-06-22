<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $data = [
            'nama' => 'Puspita sari jannati',
            'kelas' => 'A',
            'npm'  => '2377051004'
        ];

        return view('profile', $data);
        $users = UserModel::with('kelas')->get();
    
    // Debug data
    dd($users->toArray());
    
    return view('profile', compact('user'));
}
    }
