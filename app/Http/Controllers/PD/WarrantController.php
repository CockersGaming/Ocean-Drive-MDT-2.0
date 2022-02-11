<?php

namespace App\Http\Controllers\PD;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Warrant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class WarrantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warrants = Warrant::all()->where('expire', '>=', date('Y-m-d', strtotime('-7 days')));

        return view('pd.warrants.index')->with([
            'warrants' => $warrants
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reportArr = [];

        $warrant = Warrant::create([
            'name' => $request->name,
            'ped_id' => $request->pedid,
            'expire' => $request->expireDate,
            'author_id' => $request->author,
        ]);

        if ($request->reports) {
            foreach ($request->reports as $key => $report) {
                $rep = Report::findOrFail($report);
                $reportArr[$key] = $rep->id;
            }

            $warrant->update([
                'report_id' => $reportArr
            ]);
        }

        if ($request->notes) {
            $warrant->update([
                'notes' => $request->notes
            ]);
        }

        return redirect()->route('characters.show', $request->pedid)->with('success', 'Warrant ' . $warrant->id . ' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warrant  $warrent
     * @return \Illuminate\Http\Response
     */
    public function show(Warrant $warrent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warrant  $warrent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warrant = Warrant::findOrFail($id);
        $reports = Report::pluck('id', 'id');

        return view('pd.warrants.edit')->with([
            'warrant'=>$warrant,
            'reports'=>$reports
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warrant  $warrent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reportArr = [];

        $warrant = Warrant::findOrFail($id);

        if ($request->reports) {
            foreach ($request->reports as $key => $report) {
                $rep = Report::findOrFail($report);
                $reportArr[$key] = $rep->id;
            }

            $warrant->update([
                'report_id' => $reportArr
            ]);
        }

        if ($request->expireDate) {
            $warrant->update([
                'expire' => $request->expireDate
            ]);
        }

        if ($request->notes) {
            $warrant->update([
                'notes' => $request->notes
            ]);
        }

        $warrant->save();

        return redirect()->route('warrants.index')->with('success', 'Successfully updated warrant ' . $warrant->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warrant  $warrent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warrant = Warrant::findOrFail($id);
        $warrant->delete();
        return redirect()->route('warrants.index')->with('success', 'Successfully Deleted');
    }
}
