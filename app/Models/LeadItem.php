<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadItem extends Model
{
    use HasFactory;
    protected $table="tbl_lead_items";
    protected $guarded = [];
}
