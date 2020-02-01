<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function foo\func;

class Category extends Model
{
    protected $fillable = ['name','slug'];

    //------------ attributes ---------------------
    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }
    //------------ Scope --------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });

    }
}
