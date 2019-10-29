<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'dev_app_details';

    protected $guarded = array(
        'id',
        'created_at',
        'updated_at',
    );
}
