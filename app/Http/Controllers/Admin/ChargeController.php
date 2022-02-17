<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Charge;
use App\Models\ChargeCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $charges = Charge::all();
        $category = ChargeCategory::all();
        return view('Admin.charges.index')->with([
            'charges' => $charges,
            'cats' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $cats = ChargeCategory::all()->pluck('name', 'name');
        return view('Admin.charges.create')->with([
            'cats' => $cats
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        abort_unless(Auth::user()->can('Administer Charges'), '403');

        $cat = ChargeCategory::where('name', $request->category)->first();

        $charge = Charge::create([
            'name' => $request->name,
            'chargeAmount' => $request->chargeAmount,
            'jailTime' => $request->jailTime,
            'category_id' => $cat->id,
        ]);

        if ($request->description != null) {
            $charge->update([
                'description' => $request->description
            ]);
        }
        if ($request->extra != null) {
            $charge->update([
                'extra' => $request->extra
            ]);
        }
        toastr()->success('Charge '. $charge->name.' added!');
        return redirect()->route('charges.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Charge $charge
     * @return Response
     */
    public function show(Charge $charge)
    {
        return view('Admin.charges.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Charge $charge
     * @return Response
     */
    public function edit(Charge $charge)
    {
        return view('Admin.charges.edit')->with([
            'charge' => $charge
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Charge $charge
     * @return RedirectResponse
     */
    public function update(Request $request, Charge $charge)
    {
        abort_unless(Auth::user()->can('Administer Charges'), '403');
        $input = $request->all();
        $charge->fill($input)->save();

        toastr()->success('Charge '. $charge->name.' updated!');
        return redirect()->route('charges.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Charge $charge
     * @return Response
     */
    public function destroy(Charge $charge)
    {
        abort_unless(Auth::user()->can('Administer Charges'), '403');
        $charge->delete();

        toastr()->success('Charge deleted!');
        return redirect()->route('charges.index');
    }
}
