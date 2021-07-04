<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rezerv;
use Illuminate\Support\Facades\DB;
use App\skait;
use App\knyg;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RezervacijosController extends Controller
{
    public function index()
    {
        $allRez= DB::table('rezervacijos')
        ->leftJoin('skaitytojai', 'rezervacijos.fk_skaitytojas', '=', 'skaitytojai.id')
            ->leftJoin('knygos', 'rezervacijos.fk_objektas', '=', 'knygos.id_Knygos')
            ->select('rezervacijos.id_rez', 'rezervacijos.paemimas', 'rezervacijos.grazinimas', 'skaitytojai.vardas', 'skaitytojai.pavarde', 'knygos.pavadinimas')
            ->get();

        return view('pages.rezervacijos', compact('allRez'));
    }

    //Lab4 maneginimas
    public function Index2()
    {
        $allRez = rezerv::all();
        $allKny = knyg::all();
        $allSkai = skait::all();
        return view('pages.manageRezervacijos', compact('allRez','allKny', 'allSkai'));
    }

    public function insertRezervacijos(Request $request)
    {
        $validator = Validator::make(
            [   'paemimas' =>$request->input('paemimas'),
                'grazinimas' =>$request->input('grazinimas'),

                'fk_skaitytojas' =>$request->input('fk_skaitytojas'),
                'fk_objektas' =>$request->input('fk_objektas')
            ],
            [
                'paemimas' => 'required',
                'grazinimas' => 'required',

                'fk_skaitytojas' => 'required',
                'fk_objektas' => 'required'
            ]
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $allRez = new rezerv();
            $allRez->paemimas = $request->input('paemimas');
            $allRez->grazinimas  = $request->input('grazinimas');
            $allRez->fk_skaitytojas  = $request->input('fk_skaitytojas');
            $allRez->fk_objektas  = $request->input('fk_objektas');

            $allRez->save();
        }
        return Redirect::to('/rezervacijos')->with('puiku', 'Rezervacija pridėta');
    }

    public function confirmEditedRezervacijos(Request $request, $id)
    {
        $validator = Validator::make(
            [   'paemimas' =>$request->input('paemimas'),
                'grazinimas' =>$request->input('grazinimas'),

                'fk_skaitytojas' =>$request->input('fk_skaitytojas'),
                'fk_objektas' =>$request->input('fk_objektas')
            ],
            [   'paemimas' => 'required',
                'grazinimas' => 'required',

                'fk_skaitytojas' => 'required',
                'fk_objektas' => 'required'
            ]
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $data=rezerv::where('id_rez','=',$id)->update( [
                'paemimas' =>$request->input('paemimas'),
                'grazinimas' =>$request->input('grazinimas'),

                'fk_skaitytojas' =>$request->input('fk_skaitytojas'),
                'fk_objektas' =>$request->input('fk_objektas')
            ]);
        }
        return Redirect::to('/rezervacijos')->with('puiku', 'Rezervacija atnaujinta');
    }
//sut
    public function editRezervacijos($id)
    {
        $selectedRezervacijos = rezerv::where('id_rez','=',$id)
            ->join('skaitytojai', 'rezervacijos.fk_skaitytojas', '=', 'skaitytojai.id')
            ->join('knygos', 'rezervacijos.fk_objektas', '=', 'knygos.id_Knygos')
            ->select('rezervacijos.*', 'skaitytojai.*', 'knygos.*')
            ->first();
        $allKny = knyg::all();
        $allSkai = skait::all();

        return view('pages.editRezervacijos', compact('selectedRezervacijos','allKny', 'allSkai'));
    }

    public function deleteRezervacijos($id)
    {
        rezerv::where('id_rez','=',$id)->delete();
        return Redirect::to('/rezervacijos')->with('puiku', 'Rezervacija pašalinta');
    }
}
