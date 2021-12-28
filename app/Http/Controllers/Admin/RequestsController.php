<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AcceptAccessRequestMail;
use App\Mail\RejectAccessRequestMail;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newRequests = Requests::all()->where('rejected','!=', 1)->where('accepted', '!=','1');
        $acceptedRequests = Requests::all()->where('accepted', 1);
        $rejectedRequests = Requests::all()->where('rejected', 1);
        return view('Admin.requests.index')->with([
            'requests' => $newRequests,
            'accepted' => $acceptedRequests,
            'rejected' => $rejectedRequests
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accept($id)
    {
        abort_unless(Auth::user()->hasRole(1), '403');
        $request = Requests::findOrFail($id);
        $token = Str::random(26);
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'role' => $request->role,
            'token' => $token
        ];

        if ($request) {
            $request->rejected = 0;
            $request->accepted = 1;
            $request->token = $token;
            $request->save();
        }

        Mail::to($request->email)->send(new AcceptAccessRequestMail($details));

        return redirect()->route('requests.index')->with(['success' => 'Email has been sent.']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reject($id)
    {
        abort_unless(Auth::user()->hasRole(1), '403');
        $request = Requests::findOrFail($id);
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'role' => $request->role
        ];

        if ($request) {
            $request->rejected = 1;
            $request->accepted = 0;
            $request->save();;
        }

        Mail::to($request->email)->send(new RejectAccessRequestMail($details));

        return redirect()->route('requests.index')->with(['success' => 'Email has been sent.']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requests = Requests::all();
        return view('Admin.requests.index')->with('requests', $requests);
    }
}
