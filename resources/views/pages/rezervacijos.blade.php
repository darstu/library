@extends('layouts.app')

@section('content')
    <div id="content">

        <h2 class="title">Rezervacijos:</h2>

        <div style="clear: both;">&nbsp;</div>
        <table>
            <tr>
            <th>Knyga</th>
            <td>Paėmimas</td>
            <td>Numatomas grąžinimas</td>
            <td>Skaitytojas</td>
            </tr>
            @foreach($allRez as $asRez)
                <tr>
                    <td>{{$asRez->pavadinimas}}</td>
                    <td>{{$asRez->paemimas}}</td>
                    <td>{{$asRez->grazinimas}}</td>
                    <td>{{$asRez->vardas}} {{$asRez->pavarde}}</td>
                    <td><a class="btn custom-btn2" onclick="return confirm('Ar tikrai norite istrinti sia rezervacija?')" href="{{route('deleteRezervacijos', $asRez->id_rez)}}" >
                            <span>Pašalinti</span>
                        </a></td>
                    <td><a class="btn custom-btn2" href="{{ route('editRezervacijos', $asRez->id_rez)}}">
                            <span>Redaguoti</span>
                        </a></td></tr>
            @endforeach
            <br/>
            <br/>
            <br/>
            <a class="btn btn-primary " href="{{route('addRezervacijos', $asRez->id_rez)}}">
                <span>Pridėti Knyga</span>
            </a>

        </table>

        <div style="clear: both;">&nbsp;</div>
    </div>
@endsection
