<?php

namespace App\Http\Controllers;

use App\Models\subscribers as ModelsSubscribers;
use Illuminate\Http\Request;

class subscribers extends Controller
{
    public function new_subscriber(Request $request){
        $subscriber = new ModelsSubscribers();
        $subscriber->email = $request->email;
        $subscriber->save();
        
        return response()->noContent(); 
    }
}
