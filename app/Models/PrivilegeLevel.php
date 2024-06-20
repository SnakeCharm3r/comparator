<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivilegeLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'prv_name',
        'prv_status',
        'delete_status'
    ];

    // public function prv(){
    //     return $this->belongsTo(IctAccess::class);
    // }
}
