<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;



class Grandparent extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sons()
    {
        return $this->hasMany(Son::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
