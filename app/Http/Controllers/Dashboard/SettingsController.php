<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function editShippingMethod($type)
    {
        if ($type === 'free'){
            $shippingMethod = Setting::where('key','free_shipping_label')->first();
        }elseif ($type === 'inner'){
            $shippingMethod = Setting::where('key','local_shipping_label')->first();
        }elseif ($type === 'outer') {
            $shippingMethod = Setting::where('key', 'outer_shipping_label')->first();
        }else{
            $shippingMethod = Setting::where('key','free_shipping_label')->first();
        }
        return view('dashboard/settings/shippings/edit',compact('shippingMethod'));
    }

    public function updateShippingMethod(Request $request, $id)
    {

    }
}
