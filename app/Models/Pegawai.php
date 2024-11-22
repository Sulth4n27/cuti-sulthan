<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable =
    ['nama','nip','nik', 'status', 'jabatan', 'golongan',
    'jeniskelamin','alamat'];

    public function cutis()
    {
        return $this->hasMany(Cuti::class, 'pegawai_id');
    }
}
