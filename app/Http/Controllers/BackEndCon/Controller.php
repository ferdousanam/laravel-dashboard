<?php

namespace App\Http\Controllers\BackEndCon;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function id()
    {
        $id =   Auth::guard('admin')->user();
        return $id;
    }

    public function adminMainMenu()
    {
        return "adsdsd";
    }
}
