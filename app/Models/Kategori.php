<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategori";
    protected $fillable = ["kategori"];
    protected $primaryKey = 'id';

public function transaksi(){
    return $this->hasMany(Transaksi::class, 'kategori_id', 'id');
}

}
