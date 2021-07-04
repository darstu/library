<?php

namespace App\Http\Controllers;

use App\knyg;
use Illuminate\Http\Request;
use App\leid;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class LeidyklosController extends Controller
{
    public function index()
    {
        $allLeid= leid::all();
        return view('pages.leidyklos', compact('allLeid'));
    }

    //Lab4 maneginimas
    public function Index2()
    {
        return view('pages.manageLeidyklos');
    }

    public function insertLeidyklos(Request $request)
    {
        $validator = Validator::make(
            [   'name' =>$request->input('name')
            ],
            [   'name' => 'required|min:1|max:30'
            ]
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $allLeid = new leid();
            $allLeid->name = $request->input('name');

            $allLeid->save();
        }
        return Redirect::to('/leidyklos')->with('puiku', 'Leidykla pridėta');
    }

    public function confirmEditedLeidyklos(Request $request, $id)
    {
        $validator = Validator::make(
            [   'name' =>$request->input('name')
            ],
            [   'name' => 'required|min:1|max:30'
            ]
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $data=leid::where('id_Leidykla','=',$id)->update( [
                'name' =>$request->input('name')
            ]);
        }
        return Redirect::to('/leidyklos')->with('puiku', 'Leidykla atnaujinta');
        //return redirect()->back()->with('puiku', 'Autorius atnaujintas');
    }

    public function editLeidyklos($id)
    {
        $selectedLeidyklos = leid::where('id_Leidykla','=',$id)->first();
        return view('pages.editLeidyklos', compact('selectedLeidyklos'));
    }

    public function deleteLeidyklos($id)
    {
        /*$temos=knyg::where('leidykla','=',$id)->get();

        foreach ($temos as $tema) {
            knyg::where('id','=',$tema->id)->delete();
        }

        leid::where('id_Leidykla','=',$id)->delete();
        return Redirect::to('/leidyklos')->with('puiku', 'Leidykla pašalinta');*/

        try {
            leid::where('id_Leidykla','=',$id)->delete();
            return Redirect::to('/leidyklos')->with('puiku', 'Leidykla pašalinta');
        } catch (QueryException $ex) {
            echo "<p>Pirma pašalinkite Knygą</p> <a href = \"leidyklos\">Grįžti atgal</a>";
        }
    }

}
