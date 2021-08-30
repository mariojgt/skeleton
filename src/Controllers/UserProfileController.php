<?php

namespace Mariojgt\Unityuser\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Mariojgt\UnityAdmin\Models\Country;

class UserProfileController extends Controller
{
    public function index()
    {
        $data = Auth::user();
        // Get all the countrie for the select
        $country = Cache::rememberForever('country', function () {
            return Country::all()->pluck('id', 'name');
        });

        return view('unity-user::content.app.profile.index', compact(
            'data',
            'country'
        ));
    }

    /**
     * @param Request $request
     * @param User $user
     *
     * @return [blade view]
     */
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|unique:users,email,' . Auth::user()->id,
        ]);

        Auth::user()->update(Request()->all());

        return back()->with('success', __('messages.user_updated'));
    }

    /**
     * @param Request $request
     * @param User $user
     *
     * @return [blade view]
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password'   => 'required|string|min:8|confirmed',
        ]);

        $request->request->add(['password' => bcrypt(Request('password'))]);
        Auth::user()->update(Request()->all());

        return back()->with('success', __('messages.passworld_chaged'));
    }

    /**
     * @param Request $request
     * @param User $user
     *
     * @return [blade view]
     */


    public function updateAvatar(Request $request)
    {
        $request->validate([
            'file.*' => 'required|mimes:jpeg,png,gif,webp|max:2048'
        ]);

        // Setup the Path for the user avatar
        $path = public_path('image/user_avatar/' . Auth::user()->id); // Setup the Path
        if (!empty(Request('use_gravatar'))) {
            $file = new Filesystem;
            $file->cleanDirectory($path);
        } else {

            // Create the folder
            File::makeDirectory($path, $mode = 0777, true, true);
            // Prepare the file to upload
            $img = Image::make(Request('file'));
            // Resize iamge
            $img->resize(400, 800, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            // Prepare the file name
            $fileName = 'avatar' . '.' . Request('file')->extension();
            // Prepare the path to save the new file
            $savePath = $path . '/' . $fileName;
            // Save the file
            $img->save($savePath, 75, Request('file')->extension());

            Auth::user()->avatar = $fileName;
            Auth::user()->save();
        }

        return back()->with('success', __('messages.updated'));
    }
}
