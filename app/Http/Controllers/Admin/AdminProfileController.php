<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdatePasswordRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Models\User;

use App\Traits\FileUploadTrait;
use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;



class AdminProfileController extends Controller
{
    use FileUploadTrait;
    public function index(): View{
        return view('admin.profile.index');
    }
    function updateProfile(ProfileUpdateRequest $request) : RedirectResponse
    {
        $user=Auth::user();
        $imagePath=$this->uploadImage($request,'avatar');

        $user->name = $request->name;
        $user->email = $request->email;

        $user->avatar = isset($imagePath) ? $imagePath : $user->avatar;

        $user->save();

        toastr()->success('Update profile success!');
        return redirect()->back();
    }

    function updatePassword(ProfileUpdatePasswordRequest $request) : RedirectResponse
    {
        $user=Auth::user();

        $user->password = bcrypt($request->password);
        $user->save();

        toastr()->success('Update profile success!');
        return redirect()->back();
    }
}
