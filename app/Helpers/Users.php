<?php
use Illuminate\Support\Facades\Auth;

function getLoginName() {
    return Auth::user()->name;
}

function loginUserBadge() {
    return substr(Auth::user()->name, 0, 1);
}

function indent($html = null) {
    $indenter = new \Gajus\Dindent\Indenter();
    return $indenter->indent($html);
}

function super_user() {
    if (Auth::user()->user_level == 1) {
        return true;
    } else {
        return false;
    }
}

