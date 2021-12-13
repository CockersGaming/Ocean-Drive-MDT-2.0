<?php

namespace App\Http\Controllers;

use App\Mail\AccessRequestMail;
use App\Models\Requests;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

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
        Requests::create([
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'role' => $request->role
        ]);

        $details = [
            'title' => 'Access Request Sent',
            'details' => 'You have requested to access Ocean Drive\'s MDT!<br><br>You have requested access using the bellow details:<br><ul><li>'.$request->name.'</li><li>'.$request->email.'</li><li>'.$request->department.'</li><li>'.$request->role.'</li></ul>'
        ];

        Mail::to($request->email)->send(new AccessRequestMail($details));
        return redirect('login')->with(['request-success' => 'Email has been sent.']);
    }
}
