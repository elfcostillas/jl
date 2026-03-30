<?php

namespace App\Models\MasterFiles;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use LogsActivity;

    protected $table = 'employees';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',   
        'firstname',
        'lastname',
        'middlename',
        'suffixname',
        'primary_addr',
        'secondary_addr',
        'civil_status',
        'gender',
        'birthdate',
        'blood_type',
        'contact_no',
        'email',
        //biometric_id
        'remarks',
        'emergency_person',
        'emergency_relation',
        'emergency_phone',

        'company_id',
        'exit_date',
        'dept_id',
        'location_id',
        'pay_type',
        'date_hired',
        'emp_level',
        'job_title_id',
        'employee_stat',
        'exit_status_id',
        'date_regularized',
        'sched_mtwtf',
        'sched_sat',
        'id_no',
        'daily_rate',
        'is_mwe',
        'is_fixed',
        'sched_restday',
        'location_name',

        'sss_no',
        'deduct_sss',
        'tin_no',
        'phic_no',
        'deduct_phic',
        'hdmf_no',
        'deduct_hdmf',
        'hdmf_contri',
        'deduct_wtax',


        'bank_acct',
        'basic_salary',
        'release_type',
        'daily_allowance',
        'monthly_allowance',
        'is_daily',

    ];

    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function siteLocation()
    {
        return $this->belongsTo(SiteLocations::class, 'location_id');
    }

    public function employeeStatus()
    {
        return $this->belongsTo(EmployeeStatus::class, 'employee_stat');
    }   

    public function exitStatus()
    {
        return $this->belongsTo(ExitStatus::class, 'exit_status_id');
    }   

    public function civilStatus()
    {
        return $this->belongsTo(CivilStatus::class, 'civil_status');
    }

    // public function jobTitle()
    // {
    //     return $this->belongsTo(JobTitle::class, 'job_title_id');
    // }
}
