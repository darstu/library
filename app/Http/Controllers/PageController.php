<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PageController extends Controller
{
    public function index()
    {
        $time = Carbon::now('Europe/Vilnius');
        session(['entryTime' => $time]);
        return view('pages.index');
    }
    public function prisijungimas()
    {
        return view('pages.prisijungimas');
    }
    public function autoriai()
    {
        return view('pages.autoriai');
    }
    public function biografiniai()
    {
        return view('pages.biografiniai');
    }
    public function detektyvai()
    {
        return view('pages.detektyvai');
    }
    public function fantastika()
    {
        return view('pages.fantastika');
    }
    public function kontaktai()
    {
        return view('pages.kontaktai');
    }
    public function mistiniai()
    {
        return view('pages.mistiniai');
    }
    public function moksliniai()
    {
        return view('pages.moksliniai');
    }
    public function psichologiniai()
    {
        return view('pages.psichologiniai');
    }
    public function romanai()
    {
        return view('pages.romanai');
    }
    public function siaubas()
    {
        return view('pages.siaubas');
    }
    public function show(Request $request, $id)
    {
        $value = $request->session()->get('key');

        //
    }
    /*public function iautoriai()
    {
        return view('pages.iautoriai');
    }*/
}
