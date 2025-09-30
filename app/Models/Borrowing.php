<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $table = 'borrow_records';

    protected $fillable = [
        'book_id',
        'member_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
