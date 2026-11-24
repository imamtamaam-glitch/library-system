<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $fillable = ['user_id', 'member_id', 'borrowing_date', 'due_date', 'return_date', 'status'];

    public function member()
        {
            return $this->belongsTo(Member::class);
        }

    public function user()
        {
            return $this->belongsTo(User::class);
        }

    public function details()
        {
            return $this->hasMany(BorrowingDetail::class);
        }
}
