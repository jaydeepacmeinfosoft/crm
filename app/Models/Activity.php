<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers\CommonFunction;
class Activity extends Model
{
    use HasFactory;
    protected $table="activity";
    protected $guarded = [];

    protected $appends = [
        'meeting_name',
    ];
    public function getMeetingNameAttribute() {
       $meetingArr = CommonFunction::getMeetingType();
       if($this->attributes['metting'] !=""){
        return $meetingArr[$this->attributes['metting']];
       }
    }

    public function lead(){
        return $this->belongsTo(Lead::class, 'lead_id', 'iid');
    }

}
