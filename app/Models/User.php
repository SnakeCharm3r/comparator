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
        'emp_id',
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

    public function healthInfo() {
        return $this->hasMany(HealthDetails::class, 'userId');
    }

    public function nextOfKins() {
        return $this->hasMany(UserAdditionalInfo::class, 'userId');
    }

    public function familyData() {
        return $this->hasMany(UserFamilyDetails::class, 'userId');
    }

    public function language() {
        return $this->hasMany(LanguageKnowledge::class, 'userId');
    }
    public function relation() {
        return $this->hasMany(CcbrtRelation::class, 'userId');
    }

    public function isProfileComplete()
    {
        // Check if the user info is filled
        if (!$this->fname || !$this->mname || !$this->lname || !$this->email || !$this->username ||
           !$this->DOB || !$this->gender || !$this->marital_status
           || !$this->religion|| !$this->mobile || !$this->job_title
           || !$this->home_address || !$this->district || !$this->professional_reg_number
           || !$this->place_of_birth || !$this->house_no || !$this->street
           || !$this->NIN || !$this->domicile

        ) {
            return false;
        }

        // Check if family details are filled
        $familyData = $this->familyData;
        if (!$familyData || !$familyData->full_name ||
         !$familyData->relationship || !$familyData->DOB
         || !$familyData->phone_number ||
          !$familyData->occupation ||
           !$familyData->next_of_kin) {
            return false;
        }

        // Check if additional info (CCBRT relation) is filled
        $relation = $this->relation;
        if (!$relation || !$relation->full_name ||
         !$relation->relationship || !$relation->address
         || !$relation->mobile || !$relation->email ||
         !$relation->occupation) {
            return false;
        }

        // Check if language knowledge is filled
        $language = $this->language;
        if (!$language || !$language->language ||
        !$language->speaking || !$language->reading ||
        !$language->writing) {
            return false;
        }

        return true; // All checks passed
    }
}
