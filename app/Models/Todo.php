<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'todo_name',
        // 'category_id',
        // 'sub_id',
        'project_id'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function sub(){
        return $this->belongsTo(Sub::class);
    }
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
