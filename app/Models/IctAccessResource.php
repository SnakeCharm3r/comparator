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
        'email',
        'userId',
        'hmisId',
        'nhifId',
        'active_drt',
        'VPN',
        'pbax',
        'status',
        'physical_access',
        
     ];
}
