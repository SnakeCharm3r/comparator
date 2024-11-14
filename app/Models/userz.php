<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Notifiable;

class userz extends Model
{
    use HasFactory;


    //For Data values ou will use
protected $fillable = [
    "name","email","Password",
];

 /**
     * The attributes that should be cast.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        "password","token"
    ];
}
