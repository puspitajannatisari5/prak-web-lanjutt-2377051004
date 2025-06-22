<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    
    // Nama tabel di database
    protected $table = 'kelas';
    
    // Kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'nama_kelas'
    ];
    
    // Jika menggunakan timestamps (created_at, updated_at)
    public $timestamps = true;
    
    // Relasi dengan model UserModel (hasMany)
    public function users()
    {
        return $this->hasMany(UserModel::class, 'kelas_id', 'id');
    }
}