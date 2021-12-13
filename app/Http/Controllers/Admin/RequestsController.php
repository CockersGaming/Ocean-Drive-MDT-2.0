<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AcceptAccessRequestMail;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = Requests::all();
        return view('Admin.requests.index')->with('requests', $requests);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accept($id)
    {
        $request = Requests::findOrFail($id);
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'role' => $request->role
        ];

        $request->update([
            ''
        ])->save();

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
        $requests = Requests::all();
        return view('Admin.requests.index')->with('requests', $requests);
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
