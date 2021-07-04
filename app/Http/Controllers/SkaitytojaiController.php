<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\skait;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class SkaitytojaiController extends Controller
{
    public function index()
    {
        $allSkait= skait::all();
        return view('pages.skaitytojai', compact('allSkait'));
    }

    //Lab4 maneginimas
    public function Index2()
    {
        return view('pages.manageSkaitytojai');
    }

    public function insertSkaitytojai(Request $request)
    {
        $validator = Validator::make(

            [   'pavarde' =>$request->input('pavarde'),
                'vardas' =>$request->input('vardas'),
                'gimimo_data' =>$request->input('gimimo_data'),
                'gyvenamoji_vieta' =>$request->input('gyvenamoji_vieta'),
                'telefonas' =>$request->input('telefonas')
            ],
            [   'pavarde' => 'required|min:1|max:30',
                'vardas' => 'required|min:1|max:30',
                'gimimo_data' => 'required',
                'gyvenamoji_vieta' => 'required|min:1|max:30',
                'telefonas' => 'required|min:8|max:9'
            ]
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $allSkait = new skait();
            $allSkait->pavarde  = $request->input('pavarde');
            $allSkait->vardas = $request->input('vardas');
            $allSkait->gimimo_data  = $request->input('gimimo_data');
            $allSkait->gyvenamoji_vieta  = $request->input('gyvenamoji_vieta');
            $allSkait->telefonas  = $request->input('telefonas');

            $allSkait->save();
        }
        return Redirect::to('/skaitytojai')->with('puiku', 'Skaitytojas pridėtas');
    }

    public function confirmEditedSkaitytojai(Request $request, $id)
    {
        $validator = Validator::make(
            [  'pavarde' =>$request->input('pavarde'),
                'vardas' =>$request->input('vardas'),
                'gimimo_data' =>$request->input('gimimo_data'),
                'gyvenamoji_vieta' =>$request->input('gyvenamoji_vieta'),
                'telefonas' =>$request->input('telefonas')
            ],
            [   'pavarde' => 'required|min:1|max:30',
                'vardas' => 'required|min:1|max:30',
                'gimimo_data' => 'required',
                'gyvenamoji_vieta' => 'required|min:1|max:30',
                'telefonas' => 'required|min:8|max:9'
            ]
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $data=skait::where('id','=',$id)->update( [
                'pavarde' =>$request->input('pavarde'),
                'vardas' =>$request->input('vardas'),
                'gimimo_data' =>$request->input('gimimo_data'),
                'gyvenamoji_vieta' =>$request->input('gyvenamoji_vieta'),
                'telefonas' =>$request->input('telefonas')
            ]);
        }
        return Redirect::to('/skaitytojai')->with('puiku', 'Skaitytojas atnaujintas');
    }

    public function editSkaitytojai($id)
    {
        $selectedSkaitytojai = skait::where('id','=',$id)->first();
        return view('pages.editSkaitytojai', compact('selectedSkaitytojai'));
    }

    public function deleteSkaitytojai($id)
    {
        /*skait::where('id','=',$id)->delete();
        return Redirect::to('/skaitytojai')->with('puiku', 'Skaitytojas pašalintas');*/

        try {
            skait::where('id','=',$id)->delete();
            return Redirect::to('/skaitytojai')->with('puiku', 'Skaitytojas pašalintas');
        } catch (QueryException $ex) {
            echo "<p>Pirma pašalinkite Rezervaciją</p> <a href = \"rezervacija\">Grįžti atgal</a>";
        }
    }

}
