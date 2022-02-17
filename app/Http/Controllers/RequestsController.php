<?php

namespace App\Http\Controllers;

use App\Mail\AccessRequestMail;
use App\Models\Requests;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('request.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function requestAccess(Request $request)
    {
        $str = Str::uuid();

        Requests::create([
            'firstname' => $request->fname,
            'lastname' => $request->lname,
            'email' => $request->email,
            'department' => $request->department,
            'role' => $request->role,
            'token' => $str,
        ]);

        $details = [
            'title' => 'Access Request Sent',
            'details' => 'You have requested to access Ocean Drive\'s MDT!<br><br>You have requested access using the bellow details:<br>',
            'name' => $request->fname.' '.$request->lname,
            'email' => $request->email,
            'department' => $request->department,
            'role' => $request->role
        ];

        Mail::to($request->email)->send(new AccessRequestMail($details));
        toastr()->error('Email has been sent');
        return redirect('login');
    }
}
