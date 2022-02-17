<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Charge;
use App\Models\ChargeCategory;
use App\Models\Report;
use App\Models\Warrant;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $char = Character::findOrFail($id);
        $chargeCats = ChargeCategory::all();
        $charges = Charge::pluck('name', 'id');
        $reports = Report::pluck('id', 'id');
        $charReps = Report::where('ped_id', $char->id)->get();
        $charWars = Warrant::where('ped_id', $char->id)->get();
        return view('Character.show')->with([
            'char' => $char,
            'chargeCats' => $chargeCats,
            'charges' => $charges,
            'reports' => $reports,
            'charReps' => $charReps,
            'charWars' => $charWars,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return Response
     */
    public function edit(Character $character)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return Response
     */
    public function update(Request $request, Character $character)
    {
        if($request->mugshot) {
            $character->update([
                'mugshot' => $request->mugshot
            ]);
        }
        toastr()->success('Mug Shot added!');
        return redirect()->route('characters.show', $character->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character
     * @return Response
     */
    public function destroy(Character $character)
    {
        //
    }
}
