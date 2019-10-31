<?php

namespace App\Http\Controllers\DevCon;

use App\AdminModel\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectDetailsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $project = Project::first();
        return view('Admin.devProjectDetails.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $project
     * @param $param
     * @return bool
     */
    private function upload(Request $request, $project, $param) {
        if ($param == 'app_icon') {
            $getImageName = 'favicon.' . $request->$param->getClientOriginalExtension();
        } else {
            $this->validate($request, [
                $param => 'required|image|mimes:jpeg,png,jpg,gif,svg,ico|max:2048',
            ]);
            if ($param == 'company_logo') {
                $getImageName = 'logo.' . $request->$param->getClientOriginalExtension();
            } elseif ($param == 'brand_logo') {
                $getImageName = 'brand.' . $request->$param->getClientOriginalExtension();
            }
        }

        $upload = $request->$param->move(public_path('uploads/project-info'), $getImageName);
        if ($upload) {
            if ($getImageName != $project->$param){
                $oldAvatarPath = public_path() . '/uploads/project-info/' . $project->$param;
                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath);
                }
            }
            $update = $project->update(array($param => $getImageName));
            if ($update) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'project_name' => 'required',
            'company_name' => 'required',
        ]);
        $data = array(
            'app_name' => $request->project_name,
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'company_contact' => $request->contact_number,
        );
        $project = Project::find($id);
        $upload = true;
        if ($request->company_logo) {
            $res = $this->upload($request, $project, 'company_logo');
            (!$upload) ?: $upload = $res;
        }
        if (isset($request->brand_logo)) {
            $res = $this->upload($request, $project, 'brand_logo');
            (!$upload) ?: $upload = $res;
        }
        if ($request->app_icon) {
            $res = $this->upload($request, $project, 'app_icon');
            (!$upload) ?: $upload = $res;
        }
        if ($upload) {
            $update = $project->update($data);
            if ($update) {
                session()->flash('success', 'Project Details Updated Successfully');
                return redirect(route('project-details.index'));
            } else {
                session()->flash('error', 'Something Went Wrong!');
            }
        } else {
            session()->flash('error', 'Error In file Upload!');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        abort(404);
    }
}
