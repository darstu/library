<?php

namespace App\Http\Controllers;

use App\rezerv;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\knyg;
use App\leid;
use App\autor;
use App\zanr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;


class KnygosController extends Controller
{
    public function index()
    {
        $allKny= knyg::all();
        /*$allZan = zanr
            ::join('zanrai', 'zanrai.id_Zanras', '=', 'knygos.zanras')
            ->select( 'zanrai.*')
            ->get();
        $allLeid = leid
            ::join('rec_ing_tarpine', 'ingredientas.id_Ingredientas', '=', 'rec_ing_tarpine.fk_Ingredientas_id')
            ->select( 'ingredientas.*', 'rec_ing_tarpine.*')
            ->get();
        $allAut = autor
            ::join('rec_ing_tarpine', 'ingredientas.id_Ingredientas', '=', 'rec_ing_tarpine.fk_Ingredientas_id')
            ->select( 'ingredientas.*', 'rec_ing_tarpine.*')
            ->get();*/
        return view('pages.prisijungimas', compact('allKny'));

    }

    //Lab4 maneginimas
    public function Index2()
    {
        $allKny = knyg::all();
        $allZan = zanr::all();
        $allLeid = leid::all();
        $allAut = autor::all();
        return view('pages.managePrisijungimas', compact('allKny','allZan', 'allLeid', 'allAut'));
    }

    public function insertPrisijungimas(Request $request)
    {
        $validator = Validator::make(
            [   'pavadinimas' =>$request->input('pavadinimas'),
                'metai' =>$request->input('metai'),
                'kalba' =>$request->input('kalba'),
                'puslapiai' =>$request->input('puslapiai'),
                'santrauka' =>$request->input('santrauka'),

                'zanras' =>$request->input('zanras'),
                'leidykla' =>$request->input('leidykla'),
                'fk_autorius' =>$request->input('fk_autorius')
            ],
            [
                'pavadinimas' => 'required|min:1|max:50',
                'metai' =>'required|min:1|max:4',
                'kalba' =>'required|min:1|max:20',
                'puslapiai' =>'required',
                'santrauka' =>'required|min:3|max:150',

                'zanras' =>'required',
                'leidykla' =>'required',
                'fk_autorius' =>'required',
            ]
        );

        if ($validator->fails())
        {

            return Redirect::back()->withErrors($validator)->withInput();
        }
        else
        {
            $allKny = new knyg();
            $allKny->pavadinimas = $request->input('pavadinimas');
            $allKny->metai  = $request->input('metai');
            $allKny->kalba  = $request->input('kalba');
            $allKny->puslapiai  = $request->input('puslapiai');
            $allKny->santrauka  = $request->input('santrauka');
            $allKny->zanras  = $request->input('zanras');
            $allKny->leidykla  = $request->input('leidykla');
            $allKny->fk_autorius  = $request->input('fk_autorius');

            $allKny->save();

        }
        return Redirect::to('/prisijungimas')->with('puiku', 'Knyga pridėta');
    }

    public function confirmEditedPrisijungimas(Request $request, $id)
    {
        $validator = Validator::make(
            [   'pavadinimas' =>$request->input('pavadinimas'),
                'metai' =>$request->input('metai'),
                'kalba' =>$request->input('kalba'),
                'puslapiai' =>$request->input('puslapiai'),
                'santrauka' =>$request->input('santrauka'),
                'zanras' =>$request->input('zanras'),
                'leidykla' =>$request->input('leidykla'),
                'fk_autorius' =>$request->input('fk_autorius')
            ],
            [   'pavadinimas' => 'required|min:1|max:50',
                'metai' =>'required|min:1|max:4',
                'kalba' =>'required|min:1|max:20',
                'puslapiai' =>'required',
                'santrauka' =>'required|min:3|max:150',
                'zanras' =>'required',
                'leidykla' =>'required',
                'fk_autorius' =>'required'
            ]
        );

        if ($validator->fails())
        {
           return Redirect::back()->withErrors($validator)->withInput();

        }
        else
        {
            $data=knyg::where('id_Knygos','=',$id)->update( [
                    'pavadinimas' =>$request->input('pavadinimas'),
                    'metai' =>$request->input('metai'),
                    'kalba' =>$request->input('kalba'),
                    'puslapiai' =>$request->input('puslapiai'),
                    'santrauka' =>$request->input('santrauka'),
                    'zanras' =>$request->input('zanras'),
                    'leidykla' =>$request->input('leidykla'),
                    'fk_autorius' =>$request->input('fk_autorius')
            ]);
        }
        return Redirect::to('/prisijungimas')->with('puiku', 'Knyga atnaujinta');
    }

    public function editPrisijungimas($id)
    {
       /* $selectedPriskyrimas = ReceptasIng::where('rec_ing_id','=',$id)
        ->join('ingredientas','rec_ing_tarpine.fk_Ingredientas_id','=', 'ingredientas.id_Ingredientas')
        ->join('receptas','rec_ing_tarpine.fk_Receptas_id','=', 'receptas.rec_id')
        ->select( 'ingredientas.*', 'rec_ing_tarpine.*', 'receptas.*')
        ->first();
        return view('editPriskyrimas', compact('selectedPriskyrimas'));*/


        $selectedPrisijungimas = knyg::where('id_Knygos','=',$id)
            ->join('zanrai', 'knygos.zanras', '=', 'zanrai.id_Zanras')
            ->join('leidyklos', 'knygos.leidykla', '=', 'leidyklos.id_Leidykla')
            ->join('autoriai', 'knygos.fk_autorius', '=', 'autoriai.id')
            ->select('knygos.*', 'zanrai.*', 'leidyklos.*', 'autoriai.*')
            ->first();
        //$allKny = knyg::all();
        $allZan = zanr::all();
        $allLeid = leid::all();
        $allAut = autor::all();

        return view('pages.editPrisijungimas', compact('selectedPrisijungimas'/*,'allKny'*/, 'allZan', 'allLeid', 'allAut'));
    }

    public function deletePrisijungimas($id)
    {
        //  $temos=rezerv::where('fk_objektas','=',$id)->get();

        // if($temos)
        // foreach ($temos as $tema) {
        //     rezerv::where('id','=',$tema->id)->delete();
        // }

        // knyg::where('id_Knygos','=',$id)->delete();
        // return Redirect::to('/prisijungimas')->with('puiku', 'Knyga pašalinta');
        try {
            knyg::where('id_Knygos', '=', $id)->delete();
            return Redirect::to('/prisijungimas')->with('puiku', 'Knyga pašalinta');
        } catch (QueryException $ex) {
            echo "<p>Pirma pašalinkite rezervaciją</p> <a href = \"prisijungimas\">Grįžti atgal</a>";
    }
    }
}
