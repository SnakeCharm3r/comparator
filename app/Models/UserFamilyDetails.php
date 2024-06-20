<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFamilyDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'full_name',
        'relationship',
        'DOB',
        'phone_number',
        'occupation',
        'delete_status'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'userId');
    }
}
