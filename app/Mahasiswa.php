<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Mahasiswa extends Model
{
    protected $appends = ['foto_link'];
    public function getFotoLinkAttribute()
    {
      return Storage::url($this->foto);
    }
}
