<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    protected $table = 'katalog';
    protected $fillable = ['id_produk','nama_produk', 'model_produk', 'foto_produk'];

    public function categories() {
        return $this->belongsToMany(Kategori::class);
    }

    public function cariKategori($idKategori)
    {
        return $this->categories()
                    ->wherePivot('kategori_id',$idKategori);
    }
}
