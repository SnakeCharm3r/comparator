<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IctAccess extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'request_category',
        'hardware_request',
        'logical_accessId',
        'remark',
        'email',
        'aruti',
        'sap',
        'vpn',
        'pabx',
        'nhif_qualification',
        'physical_access',
        'physical_access',
        'access_card',
        'logical_accessId'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function ictLogical(){
        return $this->belongsTo(LogicalAccess::class, 'logical_accessId');
    }

}
