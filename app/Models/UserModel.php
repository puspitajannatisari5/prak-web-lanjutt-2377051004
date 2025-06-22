<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    
    // Nama tabel di database
    protected $table = 'user';
    
    // Kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'nama',
        'npm', 
        'kelas_id'
    ];
    
    // Jika menggunakan timestamps (created_at, updated_at)
    public $timestamps = true;
    
    // Relasi dengan model Kelas (belongsTo)
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
    
    // Method custom untuk mendapatkan semua data
    public static function getAll()
    {
        return self::all();
    }
    
    // Method custom untuk mendapatkan data berdasarkan ID
    public static function getById($id)
    {
        return self::find($id);
    }
    
    // Method custom untuk menyimpan data
    public function saveData($data)
    {
        $this->fill($data);
        return $this->save();
    }
    
    // Method custom untuk update data
    public function updateData($data)
    {
        $this->fill($data);
        return $this->save();
    }
    
    // Method custom untuk delete data
    public function deleteData()
    {
        return $this->delete();
    }
}
