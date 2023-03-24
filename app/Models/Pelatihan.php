<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_pelatihan',
        'deskripsi_pelatihan',
        'tanggal_mulai_pelatihan',
        'tanggal_selesai_pelatihan',
        'is_approved',
        'approved_by',
    ];

    public function user(){
        return $this->hasMany(Role::class, 'id');
    }
}
