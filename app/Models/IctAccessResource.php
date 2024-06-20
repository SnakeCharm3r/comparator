<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IctAccessResource extends Model
{
    use HasFactory;
     protected $fillable = [

    'remarkId',
    'privilegeId',
    'userCategoryId',
    'email',
    'userId',
    'hmisId',
    'aruti',
    'sap',
    'nhifId',
    'hardware_request',
    'active_drt',
    'VPN',
    'pbax',
    'status',
    'physical_access',
    'delete_status',
     ];

     public function user(){
        return $this->belongsTo(User::class, 'userId');
     }

     public function remark(){
        return $this->belongsTo(Remark::class, 'remarkId');
     }

     public function privi(){
        return $this->belongsTo(PrivilegeLevel::class, 'privilegeId');
     }
     public function hmis(){
        return $this->belongsTo(HMISAccessLevel::class, 'hmisId');
     }
     public function nhif(){
        return $this->belongsTo(NhifQualification::class, 'nhifId');
     }
}
