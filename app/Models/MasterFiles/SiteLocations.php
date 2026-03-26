<?php

namespace App\Models\MasterFiles;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class SiteLocations extends Model
{
    use LogsActivity;
    
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
