<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas.php extends Model
{
    protected $table = 'kelas';
    public $timestamps = false;

    protected $fillable = ['nama_kelas'];
}
