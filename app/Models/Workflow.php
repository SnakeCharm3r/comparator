<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ict_request_resource_id',
        'work_flow_status',
        'work_flow_completed'
    ];
}
