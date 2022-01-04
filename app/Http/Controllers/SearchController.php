<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function ped(Request $request) {
        if($request->ajax()) {
            $output = "";
            $char = Character::where('name', 'LIKE', '%' . $request->search . "%")->get();
            if ($char) {
                foreach ($char as $key => $c) {
                    $output .= '<tr>' .
                        '<td>' . $c->id . '</td>' .
                        '<td>' . $c->name . '</td>' .
                        '<td>
                            <div class="d-flex">
                                <a href="#" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-plus"></i></a>
                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
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
