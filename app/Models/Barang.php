<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga',
        'jumlah',
        'foto',
        'CategoryId'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'CategoryId');
    }
}
