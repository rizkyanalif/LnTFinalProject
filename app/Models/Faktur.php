<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    use HasFactory;

    protected $fillable = [
        'idBarang',
        'idUser',
        'namaBarang',
        'fotoBarang',
        'hargaBarang',
        'categoryBarang',
        'kuantitas',
        'alamatPengiriman',
        'kodePos',
        'total'
    ];

    public function barang(){
        return $this->belongsTo(barang::class, 'idBarang');
    }

    public function user(){
        return $this->belongsTo(barang::class, 'idUser');
    }
}
