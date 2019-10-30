<?php

use App\AdminModel\Project;
use App\Models\Admin\ProjectDetails;

function project() {
    return Project::first();
}

function brandLogo() {
    return asset('uploads/project-info/' . Project::first()->brand_logo);
}

