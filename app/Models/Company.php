<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table="companies";
    protected $fillable =[
        'company_name','email','password','number','address','logo',
    ];
    public function users() {
        return $this->hasMany(User::class);
    }

}
