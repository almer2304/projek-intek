<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $tables = 'members';

    protected $fillable = [
        'nama',
        'kelas',
        'jurusan',
        'username',
        'password',
    ];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}
