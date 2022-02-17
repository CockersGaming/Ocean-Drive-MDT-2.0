<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Character;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SearchController extends Controller
{
    /**
     * @param Request $request
     * @return Application|ResponseFactory|RedirectResponse|Response
     */
    public function ped(Request $request) {
        if($request->ajax()) {
            $output = "";
            $chars = Character::all()->filter(function ($char) {
                return $char->search(request('search'));
            });
            if ($chars) {
                foreach ($chars as $key => $c) {
                    $output .= '<tr>' .
                        '<td>' . $c->fullname() . '</td>' .
                        '<td>' . $c->citizenid . '</td>' .
                        '<td>
                            <div class="d-flex">
                                <a href="'.route('characters.show', $c->id).'" class="btn btn-secondary shadow sharp">View</a>
                            </div>
                        </td>' .
                        '</tr>';
                }
                return Response($output);
            }
        }
        return back();
    }

    /**
     * @param Request $request
     * @return Application|ResponseFactory|RedirectResponse|Response
     */
    public function car(Request $request) {
        if($request->ajax()) {
            $output = "";
            $car = Car::where('plate', 'LIKE', '%' . $request->search . "%")->orWhere('fakeplate', 'LIKE', '%' . $request->search . "%")->get();
            if ($car) {
                foreach ($car as $key => $c) {
                    $output .= '<tr>' .
                        '<td>' . $c->plate . '</td>' .
                        '<td>
                            <div class="d-flex">
                                <a href="#" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-plus"></i></a>
                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>' .
                        '</tr>';
                }
                return Response($output);
            }
        }
        return back();
    }
}
