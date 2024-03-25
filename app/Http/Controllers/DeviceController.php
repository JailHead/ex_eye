<?php

namespace App\Http\Controllers;

use App\Models\MongoDevice;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        return view('new-device');
    }

    public function destroy($deviceId)
    {
        $device = MongoDevice::find($deviceId);
        $device->delete();

        return response()->json(["result" => "ok"], 200);
    }
}
