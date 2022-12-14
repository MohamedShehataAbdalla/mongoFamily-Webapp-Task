<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;


class Son extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function grandparent()
    {
        return $this->belongsTo(Grandparent::class);
    }

    public function grandsons()
    {
        return $this->hasMany(Grandson::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
