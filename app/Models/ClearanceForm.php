<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClearanceForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_Id',
        'date',
        'ccbrt_id_card',
        'ccbrt_name_tag',
        'nhif_cards',
        'work_permit_cancelled',
        'residence_permit_cancelled',
        'repaid_salary_advance',
        'loan_balances_informed',
        'repaid_outstanding_imprest',
        'changing_room_keys',
        'office_keys',
        'mobile_phone',
        'camera',
        'ccbrt_uniforms',
        'office_car_keys',
        'other_items',
        'laptop_returned',
        'access_card_returned',
        'domain_account_disabled',
        'email_account_disabled',
        'telephone_pin_disabled',
        'openclinic_account_disabled',
        'sap_account_disabled',
        'aruti_account_disabled',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}

