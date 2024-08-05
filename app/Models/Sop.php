<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sop extends Model
{
    use HasFactory;
    protected $fillable = ['deptId','title', 'pdf_path'];
    public function department()
    {
        return $this->belongsTo(Departments::class);
    }
}
