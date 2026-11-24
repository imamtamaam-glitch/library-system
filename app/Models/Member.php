<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name', 'member_code', 'phone', 'address'];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}
