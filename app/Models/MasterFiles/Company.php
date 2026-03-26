<?php

namespace App\Models\MasterFiles;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use LogsActivity;

    protected $table = 'companies';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'company_name',
        'company_address',
        'company_status',
        'company_shortname'
    ];

    public $timestamps = false;

    public function locations()
    {
        return $this->hasMany(SiteLocations::class, 'company_id');
    }
}
