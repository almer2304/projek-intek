<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'judul',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'stok',
    ];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}
