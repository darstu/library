<?php

namespace App\Http\Controllers;

use App\knyg;
use Illuminate\Http\Request;
use App\zanr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class ZanraiController extends Controller
{
    public function index()
    {
        $allZan= zanr::all();
        return view('pages.zanrai', compact('allZan'));
    }

    //Lab4 maneginimas
    public function Index2()
    {
        return view('pages.manageZanrai');
    }

    public function insertZanrai(Request $request)
    {
        $validator = Validator::make(
            [   'names' =>$request->input('names')
            ],
            [   'names' => 'required|min:1|max:30'
            ]
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $allZan = new zanr();
            $allZan->names = $request->input('names');

            $allZan->save();
        }
        return Redirect::to('/zanrai')->with('puiku', 'Zanras pridėtas');
    }

    public function confirmEditedZanrai(Request $request, $id)
    {
        $validator = Validator::make(
            [   'names' =>$request->input('names')
            ],
            [   'names' => 'required|min:1|max:30'
            ]
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $data=zanr::where('id_Zanras','=',$id)->update( [
                'names' =>$request->input('names')
            ]);
        }
        return Redirect::to('/zanrai')->with('puiku', 'Zanras atnaujintas');
    }

    public function editZanrai($id)
    {
        $selectedZanrai = zanr::where('id_Zanras','=',$id)->first();
        return view('pages.editZanrai', compact('selectedZanrai'));
    }

    public function deleteZanrai($id)
    {
        /*$temos=knyg::where('zanras','=',$id)->get();

        foreach ($temos as $tema) {
            knyg::where('id','=',$tema->id)->delete();
        }

        zanr::where('id_Zanras','=',$id)->delete();
        return Redirect::to('/zanrai')->with('puiku', 'Zanras pašalintas');*/

        try {
            zanr::where('id_Zanras','=',$id)->delete();
            return Redirect::to('/zanrai')->with('puiku', 'Zanras pašalintas');
        } catch (QueryException $ex) {
            echo "<p>Pirma pašalinkite Knygą</p> <a href = \"zanrai\">Grįžti atgal</a>";
        }
    }
}

