<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['header', 'description', 'cover', 'body'];
    protected $dates = ['created_at'];
}
