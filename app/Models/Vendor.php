<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'contact_person', 'phone', 'email', 'address', 'contract_file', 
        'contract_start_date', 'contract_end_date', 'business_owner', 'legal_owner',
        'reference', 'counterparty', 'telephone_number', 'email_address', 'physical_address',
        'contract_type', 'internal_approval_1', 'internal_approval_2', 'status',
        'contract_total_value', 'termination_date', 'give_notice_date', 'start_date', 'end_date',
        'duration_years', 'services_satisfaction', 'grace_period_to_new_contract', 'goods_services',
        'category', 'review_interval', 'likelihood_rating', 'impact_rating', 'overall_risk_score',
        'notes_or_remarks'
    ];
}
