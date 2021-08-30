<?php

namespace Mariojgt\Unityuser\Controllers;

use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Mariojgt\UnityAdmin\Models\Country;
use Mariojgt\UnityAdmin\Models\UserAddress;

class UserAddressController extends Controller
{
    /**
     * @param Request $request
     * @param User $user
     *
     * @return [blade view]
     */
    public function store(Request $request)
    {
        $request->validate([
            'address'    => 'required | max:255',
            'town'       => 'required | max:255',
            'postcode'   => 'required | max:255',
            'country_id' => 'required',
        ]);

        $userAddress             = new UserAddress();
        $userAddress->country_id = request('country_id');
        $userAddress->phone      = request('phone');
        $userAddress->postcode   = request('postcode');
        $userAddress->address    = request('address');
        $userAddress->address_2  = request('address_2');
        $userAddress->town       = request('town');
        $userAddress->county     = request('county');
        // $userAddress->state      = request('state');
        $userAddress->save();

        Auth::user()->address()->attach($userAddress);

        return back()->with('success', 'Adress Created.');
    }

    /**
     * @param UserAddress $userAddress
     *
     * @return [blade view]
     */
    public function edit(UserAddress $userAddress)
    {
        $data = $userAddress;

        // Get all the countrie for the select
        $country = Cache::rememberForever('country', function () {
            return Country::all()->pluck('id', 'name');
        });

        return view('unity-user::content.app.profile.editAddress', compact(
            'data',
            'country'
        ));
    }

    /**
     * @param Request $request
     * @param UserAddress $userAddress
     *
     * @return [blade view]
     */
    public function update(Request $request, UserAddress $userAddress)
    {
        $request->validate([
            'address'    => 'required | max:255',
            'town'       => 'required | max:255',
            'postcode'   => 'required | max:255',
            'country_id' => 'required',
        ]);

        $userAddress->country_id = request('country_id');
        $userAddress->phone      = request('phone');
        $userAddress->postcode   = request('postcode');
        $userAddress->address    = request('address');
        $userAddress->address_2  = request('address_2');
        $userAddress->town       = request('town');
        $userAddress->county     = request('county');
        $userAddress->state      = request('state');
        $userAddress->save();

        return back()->with('success', __('messages.adress_updated'));
    }

    /**
     * @param UserAddress $userAddress
     *
     * @return Boolean [true]
     */
    public function delete(UserAddress $userAddress)
    {
        $validate = Auth::user()->address()->find($userAddress->id);
        if (!empty($validate)) {
            $userAddress->delete();
        }
        return back()->with('success', __('Address deleted'));
    }
}
