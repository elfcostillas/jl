<?php

namespace App\Models\MasterFiles;

use Illuminate\Database\Eloquent\Model;

class BooleanOptions extends Model
{
    protected $table = 'opt_yes_no';
    protected $primaryKey = 'id';

    protected $fillable = ['opt_value', 'opt_label'];

    
}
