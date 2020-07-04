<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';

    public function User()
    {
        return $this->belongsTo('app\User', 'user_id');
    }

    public function Books()
    {
        return $this->belongsTo('app\Books', 'books_id');
    }
}
