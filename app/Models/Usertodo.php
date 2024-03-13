<?php

namespace App\Models;

use App\Models\Register;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usertodo extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'list',
        'register_id'
    ];
    public function register(){
        return $this->belongsTo(Register::class);
    }
}
