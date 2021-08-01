<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MataPelajaran extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'mapel';
    protected $primaryKey = 'kode_mapel';
    protected $keyType = 'string';
    protected $fillable = [
      'kode_mapel',
      'nama_mapel',
      'keterangan',
      'created_by',
      'updated_by',
      'deleted_by'
  ];
}
