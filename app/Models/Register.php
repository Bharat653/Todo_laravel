<?php

namespace App\Models;

use App\Models\Usertodo;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Register extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
    ];
    public function usertodo(){
        return $this->hasMany(Usertodo::class,'user_id','id');      
         
    }

}
