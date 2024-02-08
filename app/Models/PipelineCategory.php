<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PipelineCategory extends Model
{
    use HasFactory;
    protected $table= 'pipelinecategories';
    protected $fillable = [
        'category',
    ];
}
