<?php

namespace App\Http\Controllers\BackEndCon;

use App\Models\Admin\Profile;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Priority;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'priority_name' => 'required',
            'priority_status' => 'required',
        ]);
        $data = $request->all();
        $insert = Priority::create($data);
        if ($insert) {
            session()->flash('success', 'Profile Created Successfully');
        } else {
            session()->flash('error', 'Something Went Wrong!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function editAvatar() {
        $user = Auth::user();
        return view('Admin.profile.edit-avatar', compact('user'));
    }

    public function updateAvatar(Request $request) {
        $this->validate($request, [
            'profile_avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $originalName = $name = $request->profile_avatar->getClientOriginalName();
        $getImageName = time() . '-' . $originalName;

        $upload = $request->profile_avatar->move(public_path('uploads/profile-image'), $getImageName);
        if ($upload) {
            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            $oldAvatarPath = public_path() . '/uploads/profile-image/' . $user->profile_image;
            if (file_exists($oldAvatarPath)) {
                unlink($oldAvatarPath);
            }
            $update = $user->update(array('profile_image' => $getImageName));
            if ($update) {
                session()->flash('success', 'Profile Avatar Updated Successfully');
            } else {
                session()->flash('error', 'Something Went Wrong!');
            }
        } else {
            session()->flash('error', 'Avatar upload failed!');
        }
        return redirect()->back();
    }

    public function editPassword() {
        $user = Auth::user();
        return view('Admin.profile.change-password', compact('user'));
    }

    public function updatePassword(Request $request) {
        $this->validate($request, [
            'current_password' => ['required', 'string', 'min:3'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        if (Hash::check($request->current_password, $user->password)) {
            $update = $user->update(array('password' => Hash::make($request->password)));
            if ($update) {
                session()->flash('success', 'Password Updated Successfully');
            } else {
                session()->flash('error', 'Something Went Wrong!');
            }
        } else {
            session()->flash('current_password', 'Your current password do not match!');
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        return view('Admin.profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);
        $user_id = Auth::user()->id;
        $user_data = array(
            'name' => $request->name,
            'email' => $request->email,
        );
        $user = User::find($user_id);

        $hasProfile = Profile::where('user_id', $user_id)->first();
        $profile_data = array(
            'user_id' => $user_id,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'address' => $request->address,
        );
        if ($user){
            $update = $user->update($user_data);
            if ($update){
                if ($hasProfile){
                    $update = $hasProfile->update($profile_data);
                }else {
                    $update = Profile::create($profile_data);
                }
            }
        }
        if ($update) {
            session()->flash('success', 'Profile Updated Successfully');
        } else {
            session()->flash('error', 'Something Went Wrong!');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Profile::find($id)->delete();
        if ($delete) {
            return response()->json(["success" => true]);
        } else {
            return response()->json(["success" => false]);
        }
    }
}
