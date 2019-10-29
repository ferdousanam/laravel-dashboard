<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $fillable = array(
        'priority_name',
        'priority_description',
        'priority_status',
    );
}
