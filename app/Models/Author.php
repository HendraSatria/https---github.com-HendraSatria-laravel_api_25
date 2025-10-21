<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Author extends Model
{
    use HasFactory;
 // Field yang bisa diisi secara massal
    protected $fillable = ['name', 'birthdate'];


       // Relasi One-to-Many: 1 Author memiliki banyak Book
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
