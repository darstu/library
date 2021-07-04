<?php

namespace App\Http\Controllers;

use App\knyg;
use Illuminate\Http\Request;
use App\autor;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class AutoriaiController extends Controller
{
    public function index()
    {
      //  $allAut = autor::orderBy('pavarde')->get();
   //     $allAutoriai = autor::where('title', 'PostTwo')->get();
      //  return view('pages.autoriai');
        $allAut= autor::paginate(1);
        return view('pages.autoriai', compact('allAut'));

    }
   /* public function store(Request $request)
    {
        $request->has('id');
        $name = $request->input('name');

        //
    }*/
    public function showProfile($id)
    {
       return view('pages.autoriubio', ['autoriai' => autor::findOrFail($id)]);
    }
    //susotvarkyt

    public function autoriubio()
    {
        $allAut= autor::all();
        return view('pages.autoriai/{id}', compact('allAut'));
    }

//Lab4 maneginimas
    public function Index2()
    {
        return view('pages.manageAutoriai');
    }

    public function insertAutoriai(Request $request)
    {
        $validator = Validator::make(
            [   'vardas' =>$request->input('vardas'),
                'pavarde' =>$request->input('pavarde'),
                'biografija' =>$request->input('biografija'),
                'data' =>$request->input('data')
            ],
            [   'vardas' => 'required|min:1|max:30',
                'pavarde' => 'required|min:1|max:30',
                'biografija' => 'required|min:3|max:150',
                'data' => 'required'
            ]
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $allAutor = new autor();
            $allAutor->vardas = $request->input('vardas');
            $allAutor->pavarde  = $request->input('pavarde');
            $allAutor->biografija  = $request->input('biografija');
            $allAutor->data  = $request->input('data');

            $allAutor->save();
        }
        return Redirect::to('/autoriai')->with('puiku', 'Autorius pridėtas');
    }

    public function confirmEditedAutoriai(Request $request, $id)
    {
        $validator = Validator::make(
            [   'vardas' =>$request->input('vardas'),
                'pavarde' =>$request->input('pavarde'),
                'biografija' =>$request->input('biografija'),
                'data' =>$request->input('data')
            ],
            [   'vardas' => 'required|min:1|max:30',
                'pavarde' => 'required|min:1|max:30',
                'biografija' => 'required|min:3|max:150',
                'data' => 'required'
            ]
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $data=autor::where('id','=',$id)->update( [
                'vardas' =>$request->input('vardas'),
                'pavarde' =>$request->input('pavarde'),
                'biografija' =>$request->input('biografija'),
                'data' =>$request->input('data')
            ]);
        }
        return Redirect::to('/autoriai')->with('puiku', 'Autorius atnaujintas');
        //return redirect()->back()->with('puiku', 'Autorius atnaujintas');
    }

    public function editAutoriai($id)
    {
        $selectedAutoriai = autor::where('id','=',$id)->first();
        return view('pages.editAutoriai', compact('selectedAutoriai'));
    }

    public function deleteAutoriai($id)
    {
        /*$temos=knyg::where('fk_autorius','=',$id)->get();

        foreach ($temos as $tema) {
            knyg::where('id','=',$tema->id)->delete();
        }*/

        /*autor::where('id','=',$id)->delete();
        return Redirect::to('/index')->with('puiku', 'Autorius pašalintas');*/

        try {
            autor::where('id','=',$id)->delete();
            return Redirect::to('/index')->with('puiku', 'Autorius pašalintas');
        } catch (QueryException $ex) {
            echo "<p>Pirma pašalinkite Knygą</p> <a href = \"autoriai\">Grįžti atgal</a>";
        }
    }
}
