<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'category_name',
        'register_id'
    ];

    public function project(): HasManyThrough
    {
     return $this->hasManyThrough(project::class, Sub::class);
    }

    public function sub (){
        return $this->hasMany(Sub::class,'category_id','id');
    }
    public function register(){
        return $this->belongsTo(Register::class);
    }
}


// class Category ;
// return $this->hasManyThrough(
//         Item::class,
//         Type::class,
//         'category_id', // Foreign key on the types table...
//         'type_id', // Foreign key on the items table...
//         'id', // Local key on the users table...
//         'id' // Local key on the categories table...
//  );