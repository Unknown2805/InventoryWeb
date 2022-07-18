<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsOut extends Model
{
    use HasFactory;

    protected $table= "products_out";
    protected $fillable= [
    
        'barang',
        'qty',
        'in',
        'jenis',
        
    ];

}
