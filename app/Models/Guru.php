<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guru extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'guru';
    protected $primaryKey = 'kode_guru';
    protected $fillable = [
      'kode_mapel',
      'photo_id',
      'nama_lengkap',
      'nuptk',
      'alamat',
      'kontak',
      'email',
      'created_by',
      'updated_by',
      'deleted_by'
  ];
}
