<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    public function User(){
        return $this->belongsTo('App\User','user_id');
    }
    public function Product(){
        return $this->belongsTo('App\Books','books_id');
    }
    protected $primaryKey = 'cmt_id';
}
