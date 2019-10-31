<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {
    protected $fillable = array(
        'selector',
        'parent_id',
        'serial_no',
        'menu_name',
        'route_name',
        'icon',
        'status',
    );

    public function parent() {
        return $this->belongsTo('App\AdminModel\Menu');
    }
}
