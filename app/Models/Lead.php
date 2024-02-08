<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $table="tbl_lead";
    protected $guarded = [];

    protected $appends = [
        'lead_edit_url', 'formated_created_at',
    ];
    protected $primaryKey = 'iid';
    public static $withoutAppends = false;

    public function getLeadEditUrlAttribute() {
        return route('lead.edit', ['lead' => $this->attributes['iid']]);
    }
    public function getFormatedCreatedAtAttribute() {
        return date('d M Y', strtotime($this->attributes['created_at']));
    }
    public function pipelinectegory(){
        return $this->belongsTo(PipelineCategory::class, 'vPipeline', 'id');
    }
     public function companies(){
        return $this->belongsTo(Company::class, 'vCompany', 'id');
    }
}
