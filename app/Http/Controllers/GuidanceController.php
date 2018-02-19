<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\audio_lookup_value;
use App\video_lookup_value;
use App\image_lookup_value;
use Illuminate\Support\Facades\DB;
use Carbon;
use Illuminate\Http\Request;
use View;

class GuidanceController extends Controller
{
    public function get_video_list()
    {
        $categories = video_lookup_value::all()->toArray();
        return view('patient/orders',compact('categories'));

    }

}
