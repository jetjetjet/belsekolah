<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
  use HasFactory, SoftDeletes;
  protected $primaryKey = 'kode_kelas';
  protected $keyType = 'string';
  protected $fillable = [
    'kode_kelas',
    'wali_kelas',
    'nama_kelas',
    'keterangan',
    'created_by',
    'updated_by',
    'deleted_by'
];
}
