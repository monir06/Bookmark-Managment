<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = 'bookmarks';
    //belongs to one user
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
