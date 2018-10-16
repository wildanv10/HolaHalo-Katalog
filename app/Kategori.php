<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Katalog;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['nama_kategori'];

    public function katalogs() {
        return $this->belongsToMany(Katalog::class);
    }
}
