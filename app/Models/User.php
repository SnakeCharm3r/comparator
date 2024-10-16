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
        'mname',
        'lname',
        'email',
        'username',
        'DOB',
        'gender',
        'marital_status',
        'religion',
        'mobile',
        'job_title',
        'home_address',
        'district',
        'professional_reg_number',
        'place_of_birth',
        'house_no',
        'street',
        'box_no',
        'plot_no',
        'popular_landmark',
        'emp_id',
        'starting_date',
        'ending_date',
        'employee_cv',
        'NIN',
        'nssf_no',
        'domicile',
        'deptId',
        'employment_typeId',
        'password',
        'delete_status',
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


    public function department() {
        return $this->belongsTo(Departments::class, 'deptId');
    }

    public function employmentType() {
        return $this->belongsTo(EmploymentTypes::class, 'employment_typeId');
    }

    public function healthDetails() {
        return $this->hasMany(HealthDetails::class, 'userId'); // Adjust if necessary
    }

       public function userFamilyDetails() {
        return $this->hasMany(UserFamilyDetails::class, 'userId');
    }

    public function languageKnowledge() {
        return $this->hasMany(LanguageKnowledge::class, 'userId');
    }

    public function ccbrtRelation() {
        return $this->hasMany(CcbrtRelation::class, 'userId');
    }

    public function jobTitle() {
        return $this->belongsTo(JobTitle::class, 'job_title');
    }
}
