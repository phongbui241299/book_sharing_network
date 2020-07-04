<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';
    public function book_type()
    {
        return $this->belongsTo('app\Books', 'id_type', 'books_id');
    }
}
