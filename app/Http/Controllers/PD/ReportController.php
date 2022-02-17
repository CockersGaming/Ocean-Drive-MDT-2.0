<?php

namespace App\Http\Controllers\PD;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\Charge;
use App\Models\Report;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $reports = Report::all();

        return view('PD.reports.index')->with([
            'reports' => $reports
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $jailTime = $this->getJailTime($request->charges);
        $chargeAmount = $this->getChargeAmount($request->charges);
        $chargeArr = $this->getChargeArr($request->charges);

        $authorUser = User::findOrFail($request->author);

        $report = Report::create([
            'ped_id' => $request->pedid,
            'title' => $request->title,
            'description' => $request->description,
            'charges' => $chargeArr,
            'author_id' => $authorUser->character()->id,
            'jail_time' => $jailTime,
            'charge_amount' => $chargeAmount
        ]);
        toastr()->success('Report ' . $report->id . ' added!');

        return redirect()->route('characters.show', $request->pedid);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        return view('PD.reports.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($id)
    {
        $report = Report::findOrFail($id);
        if ($report->author_id === Auth::user()->id || Auth::user()->hasRole([1])){
            $ped = Character::findOrFail($report->ped_id);
            $charges = Charge::all();
            return view('PD.reports.edit')->with([
                'report' => $report,
                'ped' => $ped,
                'charges' => $charges,
            ]);
        } else {
            toastr()->error("You don't have permission to do this!");

            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $jailTime = $this->getJailTime($request->charges);
        $chargeAmount = $this->getChargeAmount($request->charges);
        $chargeArr = $this->getChargeArr($request->charges);

        $authorUser = User::findOrFail($request->author);

        $report = Report::findOrFail($id)->update([
            'ped_id' => $request->pedid,
            'title' => $request->title,
            'description' => $request->description,
            'charges' => $chargeArr,
            'author_id' => $authorUser->character()->id,
            'jail_time' => $jailTime,
            'charge_amount' => $chargeAmount
        ]);
        toastr()->success('Update to '. $report->id .' Successful');

        return redirect()->route('reports.index');
    }

    /**
     * @param $charges
     * @return int
     */
    function getJailTime($charges): int
    {
        $jailTime = 0;
        foreach ($charges as $key => $charge) {
            $c = Charge::findOrFail($charge);
            $jailTime += $c->jailTime;
        }
        return $jailTime;
    }

    /**
     * @param $charges
     * @return int
     */
    function getChargeAmount($charges): int
    {
        $chargeAmount = 0;
        foreach ($charges as $key => $charge) {
            $c = Charge::findOrFail($charge);
            $chargeAmount += $c->chargeAmount;
        }
        return $chargeAmount;
    }

    /**
     * @param $charges
     * @return array
     */
    function getChargeArr($charges): array
    {
        $chargeArr = [];
        foreach ($charges as $key => $charge) {
            $c = Charge::findOrFail($charge);
            $chargeArr[$key] = $c->id;
        }
        return $chargeArr;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
