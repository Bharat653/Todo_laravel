<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'sub_name',
        'category_id'
    ];
    public function category(){
        return $this->belongsTo(Category::class);    
    }
    public function project (){
        return $this->hasMany(Project::class,'sub_id','id');
    }
}