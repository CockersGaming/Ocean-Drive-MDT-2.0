<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function goTo() {
        if (Auth::user()->hasRole([1])) {
            return redirect()->route('admin.index');
        } elseif (Auth::user()->hasRole([2])) {
            return redirect()->route('pd.index');
        } elseif (Auth::user()->hasRole([3])) {
            return redirect()->route('ems.index');
        } elseif (Auth::user()->hasRole([4])) {
            return redirect()->route('doj.index');
        } else {
            toastr()->error('An error has occurred. Contact support for assistance!');
            return redirect()->route('login');
        }
    }
}
