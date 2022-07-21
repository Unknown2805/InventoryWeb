<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    
    protected $fillable= [
        'suppliers',
        'barang',
        'qty_m',
        'qty_k',
        'qty_r',
        'masuk',
        'keluar',
        'rusak',
        'jenis',
    ];

}
