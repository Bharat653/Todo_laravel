<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'project_name',
        'sub_id'
    ];
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function sub(){
        return $this->belongsTo(Sub::class);
    }
}
