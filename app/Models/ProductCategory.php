<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = ['name','code', 'description']; //field yang boleh diisi secara massal

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
