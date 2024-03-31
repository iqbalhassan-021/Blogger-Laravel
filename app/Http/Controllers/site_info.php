<?php

namespace App\Http\Controllers;

use App\Models\siteinfo;
use Illuminate\Http\Request;

class site_info extends Controller
{
    public function site(Request $request){
        $info = new siteinfo();
        $info-> sitename = $request->sitename;
        $info-> email = $request->email;
        $info-> phone = $request->phone;
        $info-> facebook = $request->facebook;
        $info->save();
        return response()->noContent();
    }
}
