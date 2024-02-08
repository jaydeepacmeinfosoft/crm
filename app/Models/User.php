<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table="add_users";
    protected $fillable = ['name', 'email', 'password','company_id','user_roll','logo'];
     public function companies(){
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
