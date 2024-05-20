<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'DOB',
        'gender',
        'marital_status',
        'religion',
        'home_address',
        'district',
        'professional_reg_number',
        'place_of_birth',
        'house_no',
        'street',
        'profile_photo',
        'NIN',
        'nssf_no',
        'domicile',
        'deptId',
        'employment_typeId',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function departments() {
        return $this->belongsTo(Departments::class, 'deptId');
    }

    public function employmentType() {
        return $this->belongsTo(EmploymentTypes::class, 'employment_typeId');
    }

    public function healthInfo() {
        return $this->belongsTo(HealthDetails::class);
    }

    public function nextOfKins() {
        return $this->hasMany(UserAdditionalInfo::class);
    }

    public function familyData() {
        return $this->hasMany(UserFamilyDetails::class);
    }
}