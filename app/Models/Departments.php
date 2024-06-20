<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;


    protected $fillable = [
    'dept_name',
    'hod',
    'description',
    'delete_status',
    ];

    public function user() {
        return $this->hasMany(User::class);
    }

}
