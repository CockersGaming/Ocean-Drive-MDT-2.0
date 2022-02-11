<?php

namespace App\Http\Controllers\PD;

use App\Http\Controllers\Controller;
use App\Models\Charge;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getCharges() {

        $charges = Charge::all();
        return response()->json(['success'=>$charges]);
    }
}
