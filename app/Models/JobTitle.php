<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
     // Fillable attributes to allow mass assignment
     protected $fillable = ['job_title', 'deptId'];

     public function department()
     {
         return $this->belongsTo(Departments::class, 'deptId');
     }
}
