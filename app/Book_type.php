<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Book_type extends Model
{
    public $timestamps = false;
    protected $table = 'book_type';
    public function books()
    {
//    {
//        return $this->hasMany('App\Books', 'type_id');
//    }
        return $this->hasMany('app\Book_type', 'id_type', 'books_id');
    }
}
