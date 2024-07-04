<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkFlowHistory extends Model
{
    use HasFactory;
    protected $fillable=[
        'work_flow_id',
        'forwarded_by',
        'attended_by',
        'attend_date',
        'status',
        'remark',
        'parent_id'
    ];
}
