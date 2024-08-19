<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClearanceForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId', 
        'date', 
        'id_card', 
        'name_tag', 
        'nhif_cards', 
        'bonding_agreement', 
        'work_permit', 
        'residence_permit', 
        'changing_room_keys', 
        'office_keys', 
        'mobile_phone', 
        'camera', 
        'uniforms', 
        'car_keys', 
        'other_items', 
        'repaid_advance', 
        'informed_finance', 
        'repaid_imprest', 
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

