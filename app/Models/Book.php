<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Book extends Model
{
    
    use HasFactory;
    // Field yang bisa diisi secara massal
    protected $fillable = ['title', 'author_id', 'publication_year', 'genre'];

    // Relasi Many-to-One: 1 Book dimiliki oleh 1 Author
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($book) {
            $book->validate();
        });
    }
    public function validate()
    {
        $validator = Validator::make($this->attributes, [
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'publication_year' => 'required|integer',
            'genre' => 'required|string|max:255', 
        ]);
        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }
} 
