<?php

namespace App\Models\MasterFiles;

use App\Observers\VehicleObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(VehicleObserver::class)]
class Vehicles extends Model
{
    //
    protected $table = 'vehicles';
    protected $primaryKey = 'id';

    protected $fillable = [
        'encoded_on',
        'encoded_by',
        'veh_photo',
        'manufacturer_id',
        'model',
        'manufacture_year',
        'plate_no',
        'veh_identification_no',
        'veh_color',
        'assigned_to',
        'veh_type',
        'veh_code',
        'purchase_date',
        'supplier_id',
        'veh_remarks',
        'veh_status',
        'encoded_on',
        'encoded_by'
    ];  
    
    public $timestamps = false;
}
