<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $pdf_path
 * @property int $userId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement wherePdfPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereUserId($value)
 */
	class Announcement extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\IctAccessResource|null $ictAccessResource
 * @method static \Illuminate\Database\Eloquent\Builder|Approval newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Approval newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Approval query()
 */
	class Approval extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $userId
 * @property string|null $names
 * @property string|null $position
 * @property string|null $department
 * @property string|null $relation
 * @property string|null $delete_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|CcbrtRelation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CcbrtRelation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CcbrtRelation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CcbrtRelation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CcbrtRelation whereDeleteStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CcbrtRelation whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CcbrtRelation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CcbrtRelation whereNames($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CcbrtRelation wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CcbrtRelation whereRelation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CcbrtRelation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CcbrtRelation whereUserId($value)
 */
	class CcbrtRelation extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $userId
 * @property string $date
 * @property string $ccbrt_id_card
 * @property string $ccbrt_name_tag
 * @property string $nhif_cards
 * @property string $work_permit_cancelled
 * @property string $residence_permit_cancelled
 * @property string $repaid_salary_advance
 * @property string $loan_balances_informed
 * @property string $repaid_outstanding_imprest
 * @property string $changing_room_keys
 * @property string $office_keys
 * @property string $mobile_phone
 * @property string $camera
 * @property string $ccbrt_uniforms
 * @property string $office_car_keys
 * @property string|null $other_items
 * @property string $laptop_returned
 * @property string $access_card_returned
 * @property string $domain_account_disabled
 * @property string $email_account_disabled
 * @property string $telephone_pin_disabled
 * @property string $openclinic_account_disabled
 * @property string $sap_account_disabled
 * @property string $aruti_account_disabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereAccessCardReturned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereArutiAccountDisabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereCamera($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereCcbrtIdCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereCcbrtNameTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereCcbrtUniforms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereChangingRoomKeys($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereDomainAccountDisabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereEmailAccountDisabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereLaptopReturned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereLoanBalancesInformed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereMobilePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereNhifCards($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereOfficeCarKeys($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereOfficeKeys($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereOpenclinicAccountDisabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereOtherItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereRepaidOutstandingImprest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereRepaidSalaryAdvance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereResidencePermitCancelled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereSapAccountDisabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereTelephonePinDisabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClearanceForm whereWorkPermitCancelled($value)
 */
	class ClearanceForm extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $requested_resource_id
 * @property string $work_flow_status
 * @property int $work_flow_completed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow query()
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow whereRequestedResourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow whereWorkFlowCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow whereWorkFlowStatus($value)
 */
	class Clearance_work_flow extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $work_flow_id
 * @property int|null $forwarded_by
 * @property int|null $attended_by
 * @property string|null $status
 * @property string|null $remark
 * @property string|null $attend_date
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow_history newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow_history newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow_history query()
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow_history whereAttendDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow_history whereAttendedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow_history whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow_history whereForwardedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow_history whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow_history whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow_history whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow_history whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow_history whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clearance_work_flow_history whereWorkFlowId($value)
 */
	class Clearance_work_flow_history extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $dept_name
 * @property string $description
 * @property string|null $delete_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Sop> $sops
 * @property-read int|null $sops_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $user
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder|Departments newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departments newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departments query()
 * @method static \Illuminate\Database\Eloquent\Builder|Departments whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departments whereDeleteStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departments whereDeptName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departments whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departments whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departments whereUpdatedAt($value)
 */
	class Departments extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $employment_type
 * @property string $description
 * @property string|null $delete_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $user
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentTypes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentTypes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentTypes query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentTypes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentTypes whereDeleteStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentTypes whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentTypes whereEmploymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentTypes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmploymentTypes whereUpdatedAt($value)
 */
	class EmploymentTypes extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Form newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Form newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Form query()
 */
	class Form extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $names
 * @property string|null $status
 * @property string|null $delete_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HMISAccessLevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HMISAccessLevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HMISAccessLevel query()
 * @method static \Illuminate\Database\Eloquent\Builder|HMISAccessLevel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HMISAccessLevel whereDeleteStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HMISAccessLevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HMISAccessLevel whereNames($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HMISAccessLevel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HMISAccessLevel whereUpdatedAt($value)
 */
	class HMISAccessLevel extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $userId
 * @property string $physical_disability
 * @property string|null $blood_group
 * @property string|null $illness_history
 * @property string|null $health_insurance
 * @property string|null $insur_name
 * @property string|null $insur_no
 * @property string|null $allergies
 * @property string|null $delete_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $user
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder|HealthDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HealthDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HealthDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|HealthDetails whereAllergies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthDetails whereBloodGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthDetails whereDeleteStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthDetails whereHealthInsurance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthDetails whereIllnessHistory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthDetails whereInsurName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthDetails whereInsurNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthDetails wherePhysicalDisability($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthDetails whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthDetails whereUserId($value)
 */
	class HealthDetails extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $loan_status
 * @property string|null $form_iv_index_no
 * @property string|null $hr_comment
 * @property string|null $hr_member
 * @property string $signature
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Hslb newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hslb newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hslb query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hslb whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hslb whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hslb whereFormIvIndexNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hslb whereHrComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hslb whereHrMember($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hslb whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hslb whereLoanStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hslb whereSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hslb whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hslb whereUserId($value)
 */
	class Hslb extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $remarkId
 * @property int $privilegeId
 * @property string|null $email
 * @property int $userId
 * @property int $hmisId
 * @property int|null $nhifId
 * @property string|null $aruti
 * @property string|null $active_drt
 * @property string|null $VPN
 * @property string|null $pbax
 * @property string|null $sap
 * @property string|null $hardware_request
 * @property string|null $network_folder
 * @property int|null $folder_hprivilege
 * @property string|null $status
 * @property string|null $physical_access
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int $delete_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\HMISAccessLevel $hmis
 * @property-read \App\Models\NhifQualification|null $nhif
 * @property-read \App\Models\PrivilegeLevel $privi
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource query()
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource whereActiveDrt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource whereAruti($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource whereDeleteStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource whereFolderHprivilege($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource whereHardwareRequest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource whereHmisId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource whereNetworkFolder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource whereNhifId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource wherePbax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource wherePhysicalAccess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource wherePrivilegeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource whereRemarkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource whereSap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IctAccessResource whereVPN($value)
 */
	class IctAccessResource extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|IdCardRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IdCardRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IdCardRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|IdCardRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IdCardRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IdCardRequest whereUpdatedAt($value)
 */
	class IdCardRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $deptId
 * @property string $job_title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Departments $department
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle query()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle whereDeptId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle whereUpdatedAt($value)
 */
	class JobTitle extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $userId
 * @property string $language
 * @property string $speaking
 * @property string $reading
 * @property string $writing
 * @property string|null $delete_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageKnowledge newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageKnowledge newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageKnowledge query()
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageKnowledge whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageKnowledge whereDeleteStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageKnowledge whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageKnowledge whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageKnowledge whereReading($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageKnowledge whereSpeaking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageKnowledge whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageKnowledge whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageKnowledge whereWriting($value)
 */
	class LanguageKnowledge extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $levelNo
 * @property string $level_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Level newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Level newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Level query()
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereLevelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereLevelNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereUpdatedAt($value)
 */
	class Level extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IctAccessResource> $ict
 * @property-read int|null $ict_count
 * @method static \Illuminate\Database\Eloquent\Builder|LogicalAccess newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LogicalAccess newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LogicalAccess query()
 */
	class LogicalAccess extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $status
 * @property string|null $delete_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NhifQualification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NhifQualification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NhifQualification query()
 * @method static \Illuminate\Database\Eloquent\Builder|NhifQualification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NhifQualification whereDeleteStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NhifQualification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NhifQualification whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NhifQualification whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NhifQualification whereUpdatedAt($value)
 */
	class NhifQualification extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $pdf_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Policy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Policy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Policy query()
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy wherePdfPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereUpdatedAt($value)
 */
	class Policy extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $prv_name
 * @property string $prv_status
 * @property string|null $delete_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PrivilegeLevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrivilegeLevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrivilegeLevel query()
 * @method static \Illuminate\Database\Eloquent\Builder|PrivilegeLevel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrivilegeLevel whereDeleteStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrivilegeLevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrivilegeLevel wherePrvName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrivilegeLevel wherePrvStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrivilegeLevel whereUpdatedAt($value)
 */
	class PrivilegeLevel extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $rmk_name
 * @property string $status
 * @property string|null $delete_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Remark newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Remark newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Remark query()
 * @method static \Illuminate\Database\Eloquent\Builder|Remark whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Remark whereDeleteStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Remark whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Remark whereRmkName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Remark whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Remark whereUpdatedAt($value)
 */
	class Remark extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $deptId
 * @property string $title
 * @property string|null $pdf_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Departments|null $departments
 * @method static \Illuminate\Database\Eloquent\Builder|Sop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sop query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sop whereDeptId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sop wherePdfPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sop whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sop whereUpdatedAt($value)
 */
	class Sop extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $fname
 * @property string|null $mname
 * @property string $lname
 * @property string|null $DOB
 * @property string $username
 * @property string|null $gender
 * @property string|null $marital_status
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $religion
 * @property string|null $mobile
 * @property string|null $job_title
 * @property string|null $home_address
 * @property string|null $district
 * @property string|null $region
 * @property string|null $professional_reg_number
 * @property string|null $place_of_birth
 * @property string|null $house_no
 * @property string|null $street
 * @property string|null $emp_id
 * @property int $deptId
 * @property int $employment_typeId
 * @property int|null $role_id
 * @property string|null $employee_cv
 * @property string|null $NIN
 * @property string|null $nssf_no
 * @property string|null $domicile
 * @property mixed $password
 * @property string|null $signature
 * @property string|null $profile_picture
 * @property string|null $delete_status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Departments $department
 * @property-read \App\Models\EmploymentTypes $employmentType
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserFamilyDetails> $familyData
 * @property-read int|null $family_data_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\HealthDetails> $healthInfo
 * @property-read int|null $health_info_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LanguageKnowledge> $language
 * @property-read int|null $language_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserAdditionalInfo> $nextOfKins
 * @property-read int|null $next_of_kins_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CcbrtRelation> $relation
 * @property-read int|null $relation_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDOB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeleteStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeptId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDomicile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmpId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmployeeCv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmploymentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHomeAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHouseNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMaritalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNIN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNssfNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePlaceOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfessionalRegNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereReligion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $userId
 * @property string $full_name
 * @property string $relationship
 * @property string $address
 * @property string|null $mobile
 * @property string|null $email
 * @property string|null $occupation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserAdditionalInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAdditionalInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAdditionalInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAdditionalInfo whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAdditionalInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAdditionalInfo whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAdditionalInfo whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAdditionalInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAdditionalInfo whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAdditionalInfo whereOccupation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAdditionalInfo whereRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAdditionalInfo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAdditionalInfo whereUserId($value)
 */
	class UserAdditionalInfo extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserApproval newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserApproval newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserApproval query()
 */
	class UserApproval extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $userId
 * @property string $full_name
 * @property string $relationship
 * @property string|null $occupation
 * @property string $DOB
 * @property string|null $phone_number
 * @property string|null $delete_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserFamilyDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFamilyDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFamilyDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFamilyDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFamilyDetails whereDOB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFamilyDetails whereDeleteStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFamilyDetails whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFamilyDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFamilyDetails whereOccupation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFamilyDetails wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFamilyDetails whereRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFamilyDetails whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFamilyDetails whereUserId($value)
 */
	class UserFamilyDetails extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $business_owner
 * @property string|null $legal_owner
 * @property string|null $reference
 * @property string|null $counterparty
 * @property string|null $telephone_number
 * @property string|null $email_address
 * @property string|null $physical_address
 * @property string|null $contract_type
 * @property string|null $internal_approval_1
 * @property string|null $internal_approval_2
 * @property string $status
 * @property string|null $contract_total_value
 * @property string|null $termination_date
 * @property string|null $give_notice_date
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int|null $duration_years
 * @property string|null $services_satisfaction
 * @property int|null $grace_period_to_new_contract
 * @property string|null $services
 * @property string|null $category
 * @property string|null $review_interval
 * @property int|null $likelihood_rating
 * @property int|null $impact_rating
 * @property int|null $overall_risk_score
 * @property string|null $notes_or_remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereBusinessOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereContractTotalValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereContractType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereCounterparty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereDurationYears($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereEmailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereGiveNoticeDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereGracePeriodToNewContract($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereImpactRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereInternalApproval1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereInternalApproval2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereLegalOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereLikelihoodRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereNotesOrRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereOverallRiskScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor wherePhysicalAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereReviewInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereServices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereServicesSatisfaction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereTelephoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereTerminationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereUpdatedAt($value)
 */
	class Vendor extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $work_flow_id
 * @property int|null $forwarded_by
 * @property int|null $attended_by
 * @property string|null $status
 * @property string|null $rejection_reason
 * @property string|null $remark
 * @property string|null $attend_date
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WorkFlowHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkFlowHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkFlowHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkFlowHistory whereAttendDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkFlowHistory whereAttendedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkFlowHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkFlowHistory whereForwardedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkFlowHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkFlowHistory whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkFlowHistory whereRejectionReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkFlowHistory whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkFlowHistory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkFlowHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkFlowHistory whereWorkFlowId($value)
 */
	class WorkFlowHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $ict_request_resource_id
 * @property string $work_flow_status
 * @property int $work_flow_completed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Workflow newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Workflow newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Workflow query()
 * @method static \Illuminate\Database\Eloquent\Builder|Workflow whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workflow whereIctRequestResourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workflow whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workflow whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workflow whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workflow whereWorkFlowCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workflow whereWorkFlowStatus($value)
 */
	class Workflow extends \Eloquent {}
}

