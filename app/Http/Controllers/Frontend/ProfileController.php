<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PasswordRequest;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Traits\FileUploadTrait;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Response;

class ProfileController extends Controller
{
    use FileUploadTrait;
    public function updateProfile(ProfileUpdateRequest $request) : RedirectResponse
    {
        $user=Auth::user();


        $user->name = $request->name;
        $user->email = $request->email;

        // $imagePath=$this->uploadImage($request,'avatar');
        // $user->avatar = isset($imagePath) ? $imagePath : $user->avatar;

        $user->save();

        toastr()->success('Update profile success!');
        return redirect()->back();
    }

    public function updatePassword(PasswordRequest $request) : RedirectResponse
    {
        $user=Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        toastr()->success("Update password successfull");
        return to_route('dashboard');
    }
    public function updateAvatar(Request $request)
    {
        //dd($request->all());
        $imagePath = $this->uploadImage($request,'avatar');

        $user=Auth::user();
        $user->avatar = $imagePath;
        $user->save();

        return response(['status'=>'success','message'=> 'Avatar updated successfully']);
    }
}
