<?php

namespace App\Models\MasterFiles;

use Illuminate\Database\Eloquent\Model;

class SiteLocations extends Model
{
    protected $table = 'company_locations';

    protected $primaryKey = 'id';

    protected $fillable = [
        'company_id',
        'location_name',
        'location_address',
        'location_status'
    ];

    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
