<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;


    protected $fillable = [
    'dept_name',
    'description',
    ];

    public function user() {
        return $this->hasMany(User::class, 'deptId');
    }
    public function sops()
    {
        return $this->hasMany(Sop::class, 'deptId');
    }
}
