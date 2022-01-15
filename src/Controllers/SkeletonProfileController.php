<?php

namespace Mariojgt\Skeleton\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Mariojgt\Castle\Helpers\AutenticatorHandle;

class SkeletonProfileController extends Controller
{
    /**
     * @return [blade view]
     */
    public function profile()
    {
        if (config('skeleton.inertiajs_enable')) {
            $autenticator = new AutenticatorHandle();
            return Inertia::render('Dashboard/MyProfile', [
                'autenticator'        => $autenticator->generateCode(Auth()->user()->email),
                'autenticator_enable' => Auth()->user()->twoStepsEnable(),
            ]);
        } else {
            return view('skeleton::content.profile.index');
        }
    }

      /**
     * Check if the code that the user type match with the autenticator
     * @param Request $request
     *
     * @return [type]
     */
    public function enable2fa(Request $request)
    {
        $request->validate([
            'code'       => 'required',
        ]);

        $autenticatorHandle = new AutenticatorHandle();
        $verification       = $autenticatorHandle->checkCode(Request('code'));

        // if true we can sync the user
        if ($verification) {
            Auth::user()->syncAutenticator(decrypt(Session::get('autenticator_key')));
            // Return success
            return Redirect::back()
            ->with('success', 'code sync with success.');
        } else {
            // Return success
            return Redirect::back()
            ->with('error', 'Sorry Code invalid try again.');
        }
    }
}
